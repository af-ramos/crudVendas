@extends('index')
@section('content')
    <div class='caixa-central'>
        <p class='titulo mb-4'> ATUALIZAR <p>
        <form action="{{ route('usuarios.atualizar', ['id' => $usuario_edicao->id]) }}" method="POST">
            @method('PUT')
            @csrf

            <div class="input-group mb-3">
                <span class="input-group-text"> Nome </span>
                <input type="text" class="form-control" name='nome' placeholder="Digite seu nome..." value="{{ $usuario_edicao->nome }}">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"> Documento </span>
                <input type="text" class="form-control" name='documento' placeholder="Digite seu documento..." value="{{ $usuario_edicao->documento }}">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"> Telefone </span>
                <input type="text" class="form-control" name='telefone' placeholder="Digite seu telefone..." value="{{ $usuario_edicao->telefone }}">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"> Usuário </span>
                <input type="text" class="form-control" name='usuario' placeholder="Digite seu usuário..." value="{{ $usuario_edicao->usuario }}">
            </div>
            <div class="input-group mb-3">
                <span class="input-group-text"> Senha </span>
                <input type="text" class="form-control" name='senha' placeholder="Digite sua senha..." value="{{ $usuario_edicao->senha }}">
            </div>
            <select class="form-select mb-3" name="cargo" {{ $usuario->cargo != 2 ? 'disabled' : '' }}>
                @foreach ($cargos as $cargo)
                    <option value="{{ $cargo->id }}" {{$usuario->cargo == $cargo->id ? 'selected' : ''}}> {{$cargo->descricao}} </option>
                @endforeach
            </select>

            <div class='d-grid gap-2'>
                <input type="submit" value="ATUALIZAR" class='btn btn-success btn-lg mt-3 botao'>
            </div>
        </form>
    </div>
@stop