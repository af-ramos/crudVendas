@extends('index')
@section('content')
    <p class='titulo mt-4'> FAZER NOVO PEDIDO </p>

    <div class='m-3'>
        <form action="{{ route('pedidos.criar') }}" method="POST">
            @csrf

            <table id='tabela-produtos' class="cell-border stripe">
                <thead>
                    <tr>
                        <th> ID </th>
                        <th> Descrição </th>
                        <th> Preço </th>
                        <th> Quantidade </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $p)
                        <tr>
                            <td> {{$p->id}} </td>
                            <td> {{$p->descricao}} </td>
                            <td> 
                                <div class="input-group mb-3">
                                    <span class="input-group-text"> R$ </span>
                                    <input type="hidden" value="{{ $p->valor }}" name="{{ $p->id }}[valor]">
                                    <input type="text" class="form-control" value="{{$p->valor_formatado}}" readonly>
                                </div>    
                            </td>
                            <td> <input type='number' class='form-control' name="{{ $p->id }}[quantidade]" min='0' value='0'> </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class='d-grid gap-2'>
                <button type='submit' class='btn btn-primary btn-lg botao'> FAZER PEDIDO </button>
            </div>
        </form>

        <div class='d-grid gap-2'>
            <a href="{{ route('pedidos.mostrar') }}" class='btn btn-danger btn-lg botao mt-3'> VOLTAR </a>
        </div>
    </div>

@stop