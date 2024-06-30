<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

class UsuarioController extends Controller
{
    public function entrar(Request $request) {
        $retornoUsuario = Usuario::where([
            'usuario' => $request->usuario,
            'senha' => $request->senha
        ])->get();

        if ($retornoUsuario->count() > 0) {
            $request->session()->put('id', $retornoUsuario->first()->id);
            return view('index', ['usuario' => $retornoUsuario->first(), 'tela' => 'index']);
        }
    }

    public function criar(Request $request) {
        $retornoUsuario = Usuario::create([
            'nome' => $request->nome,
            'documento' => $request->documento,
            'telefone' => $request->telefone,
            'usuario' => $request->usuario,
            'senha' => $request->senha,
            'cargo' => 1
        ]);

        if ($retornoUsuario) {
            return view('entrar');
        }
    }

    public function atualizar(Request $request) {
        $retornoUsuario = Usuario::where('id', $request->route('id'));
        $retornoUsuario->update([
            'nome' => $request->nome,
            'documento' => $request->documento,
            'telefone' => $request->telefone,
            'usuario' => $request->usuario,
            'senha' => $request->senha,
            'cargo' => $request->cargo
        ]);

        return view('index', [
            'usuario' => Usuario::where('id', $request->session()->get('id'))->get()->first(), 
            'tela' => 'index'
        ]);
    }

    public function telaAtualizar(Request $request) {
        return view('usuarios.atualizar', [
            'usuario' => Usuario::where('id', $request->session()->get('id'))->get()->first(),
            'usuario_edicao' => Usuario::where('id', $request->route('id'))->get()->first(),
            'tela' => 'atualizar'
        ]);
    }

    public function mostrar(Request $request) {
        return view('usuarios.mostrar', [
            'usuario' => Usuario::where('id', $request->session()->get('id'))->get()->first(),
            'usuarios' => Usuario::all(),
            'tela' => 'usuarios'
        ]);
    }
}
