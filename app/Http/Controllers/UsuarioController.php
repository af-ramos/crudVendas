<?php

namespace App\Http\Controllers;

use App\Exceptions\UsuarioException;
use App\Models\Cargo;
use App\Models\Usuario;
use Carbon\Carbon;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

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
        $validacao = UsuarioException::validar($request);
        if ($validacao->fails()) {
            return redirect()->route('usuarios.telaCriar')->withErrors($validacao);
        }

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
        $retorno_nome_usuario = Usuario::where('usuario', $request->usuario)->first();

        $except[] = (!empty($retorno_nome_usuario) && $retorno_nome_usuario->id == $request->route('id')) ? 'usuario' : null;
        $except[] = empty($request->senha) ? 'senha' : null;

        $validacao = UsuarioException::validar($request, $except);
        if ($validacao->fails()) {
            return redirect()->route('usuarios.telaAtualizar', [$request->route('id')])->withErrors($validacao);
        }

        $retorno_usuario = Usuario::find($request->route('id'));
        $campos_usuario = [
            'nome' => $request->nome,
            'documento' => $request->documento,
            'telefone' => $request->telefone,
            'usuario' => $request->usuario,
            'cargo' => $request->cargo
        ];

        if ($request->filled('senha')) {
            $campos_usuario['senha'] = Hash::make($request->senha);
        }

        $retorno_usuario->update($campos_usuario);
        return redirect()->route('index');
    }

    public function telaAtualizar(Request $request) {
        $usuario = Usuario::find($request->session()->get('id'))->first();
        $usuario->senha = '';

        $usuario_edicao = Usuario::find($request->route('id'))->first();
        $usuario_edicao->senha = '';

        return view('usuarios.atualizar', [
            'usuario' => $usuario,
            'usuario_edicao' => $usuario_edicao,
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
