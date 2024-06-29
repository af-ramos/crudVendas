<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RedirectController extends Controller
{
    public function redirect(Request $request) {
        if ($request->acao == 'Cadastrar') {
            return view('usuarios.criar');
        }

        return (new UsuarioController())->login($request);
    }
}
