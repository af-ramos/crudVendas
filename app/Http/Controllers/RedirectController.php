<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function redirecionar(Request $request) {
        if ($request->acao == 'CADASTRAR') {
            return redirect()->route('usuarios.telaCriar');
        }

        if ((new UsuarioController())->entrar($request)) {
            return redirect()->route('index');
        }

        return redirect()->route('usuarios.entrar')->withErrors(['login' => 'Usuário ou senha inválidos']);
    }

    public function index(Request $request) {
        return view('index', [
            'usuario' => Usuario::where('id', $request->session()->get('id'))->get()->first(), 
            'tela' => 'index'
        ]);
    }
}
