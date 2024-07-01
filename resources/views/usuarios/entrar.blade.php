@extends('models/entrar_cadastrar')
@section('content')
    <div class="caixa-central">
        <p class='titulo mb-4'> LOGIN </p>
        <form action="{{ route('redirecionar') }}" method="POST">
            @csrf

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
                <input type="submit" value="ENTRAR" name="acao" class='btn btn-primary btn-lg mt-3 botao'>
                <input type="submit" value="CADASTRAR" name="acao" class='btn btn-success btn-lg botao'>
            </div>
        </form>
    </div>
@stop