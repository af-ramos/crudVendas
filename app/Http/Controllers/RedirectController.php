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

        return (new UsuarioController())->entrar($request);
    }

    public function index(Request $request) {
        return view('index', [
            'usuario' => Usuario::where('id', $request->session()->get('id'))->get()->first(), 
            'tela' => 'index'
        ]);
    }
}
