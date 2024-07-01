<?php

namespace App\Http\Controllers;

use App\Models\Cargo;
use App\Models\Usuario;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UsuarioController extends Controller
{
    public function entrar(Request $request) {
        $retorno_usuario = Usuario::where([
            'usuario' => $request->usuario,
        ])->first();

        if (!empty($retorno_usuario) && Hash::check($request->senha, $retorno_usuario->senha)) {
            $request->session()->put('id', $retorno_usuario->id);
            return true;
        }
        
        return false;
    }

    public function sair(Request $request) {
        $request->session()->forget('id');
        return redirect()->route('usuarios.entrar');
    }

    public function criar(Request $request) {
        Usuario::create([
            'nome' => $request->nome,
            'documento' => $request->documento,
            'telefone' => $request->telefone,
            'usuario' => $request->usuario,
            'senha' => Hash::make($request->senha),
            'cargo' => 1
        ]);

        return redirect()->route('usuarios.entrar');
    }

    public function atualizar(Request $request) {
        $retornoUsuario = Usuario::where('id', $request->route('id'));
        $retornoUsuario->update([
            'nome' => $request->nome,
            'documento' => $request->documento,
            'telefone' => $request->telefone,
            'usuario' => $request->usuario,
            'senha' => Hash::make($request->senha),
            'cargo' => $request->cargo
        ]);

        return redirect()->route('index');
    }

    public function telaAtualizar(Request $request) {
        return view('usuarios.atualizar', [
            'usuario' => Usuario::where('id', $request->session()->get('id'))->get()->first(),
            'usuario_edicao' => Usuario::where('id', $request->route('id'))->get()->first(),
            'cargos' => Cargo::all(),
            'tela' => 'atualizar'
        ]);
    }

    public function telaCriar() {
        return view('usuarios.criar');
    }

    public function mostrar(Request $request) {
        $usuarios = Usuario::all();

        foreach ($usuarios as $usuario) {
            $usuario->cargo = Cargo::find($usuario->cargo)->descricao;
        }

        return view('usuarios.mostrar', [
            'usuario' => Usuario::where('id', $request->session()->get('id'))->get()->first(),
            'usuarios' => $usuarios,
            'tela' => 'usuarios'
        ]);
    }

    public function remover(Request $request) {
        Usuario::destroy($request->route('id'));
        return redirect()->route('usuarios.mostrar');
    }
}
