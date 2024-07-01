@extends('models/entrar_cadastrar')
@section('content')
    <div class='caixa-central'>
        <p class='titulo mb-4'> CADASTRAR <p>
        <form action="{{ route('usuarios.criar') }}" method="POST">
            @csrf

            <div class="input-group mb-3">
                <span class="input-group-text"> Nome </span>
                <input type="text" class="form-control" name='nome' placeholder="Digite seu nome...">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"> Documento </span>
                <input type="text" class="form-control" name='documento' placeholder="Digite seu documento...">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"> Telefone </span>
                <input type="text" class="form-control" name='telefone' placeholder="Digite seu telefone...">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"> Usuário </span>
                <input type="text" class="form-control" name='usuario' placeholder="Digite seu usuário...">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"> Senha </span>
                <input type="password" class="form-control" name='senha' placeholder="Digite sua senha...">
            </div>
            
            @if($errors->any())
                <div class="alert alert-danger mb-0 pb-0">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li> {{ $error }} </li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class='d-grid gap-2'>
                <input type="submit" value="CADASTRAR" class='btn btn-success btn-lg mt-3 botao'>
                <input type="reset" value="LIMPAR" class='btn btn-primary btn-lg botao'>
                <a href="{{ route('usuarios.entrar') }}" class='btn btn-danger btn-lg botao'> VOLTAR </a>
            </div>
        </form>
    </div>
@stop