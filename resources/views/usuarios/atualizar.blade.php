@extends('index')
@section('content')
    <h2> ATUALIZAR </h2>
    <form action="{{ route('usuarios.atualizar', ['id' => $usuario_edicao->id]) }}" method="POST">
        @method('PUT')
        @csrf

        Nome: <input type="text" name="nome" value="{{ $usuario_edicao->nome }}"> <br> <br>
        Documento: <input type="text" name="documento" value="{{ $usuario_edicao->documento }}"> <br> <br>
        Telefone: <input type="text" name="telefone" value="{{ $usuario_edicao->telefone }}"> <br> <br>
        Usuário: <input type="text" name="usuario" value="{{ $usuario_edicao->usuario }}"> <br> <br>
        Senha: <input type="password" name="senha" value="{{ $usuario_edicao->senha }}"> <br> <br>
        Cargo: <input type="text" name="cargo" value="{{ $usuario_edicao->cargo }}" {{ $usuario->cargo != 2 ? 'readonly' : '' }}> <br> <br>

        <input type="submit" value="Atualizar">
    </form>
@stop