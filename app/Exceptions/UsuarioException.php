<?php

namespace App\Exceptions;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UsuarioException extends Exception
{
    protected static $fields = [
        'usuario' => 'required|unique:usuarios|max:20',
        'nome' => 'required|max:30',
        'telefone' => 'max:11',
        'documento' => 'required|max:14',
        'senha' => 'required|max:256'
    ]; 

    protected static $messages = [
        'usuario.required' => 'Usuário obrigatório',
        'usuario.unique' => 'Usuário já cadastrado',
        'usuario.max' => 'Usuário de 20 caracteres',
        'nome.required' => 'Nome obrigatório',
        'nome.max' => 'Nome de 30 caracteres',
        'telefone.max' => 'Telefone de 11 caracteres',
        'documento.required' => 'Documento obrigatório',
        'documento.max' => 'Documento de 14 caracteres',
        'senha.required' => 'Senha obrigatória',
        'senha.max' => 'Senha de 256 caracteres'
    ];

    public static function validar(Request $request, array $except = []) {
        return Validator::make($request->all(), array_diff_key(self::$fields, array_flip($except)), self::$messages);
    }
}
