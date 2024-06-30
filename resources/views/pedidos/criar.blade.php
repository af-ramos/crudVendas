@extends('index')
@section('content')
    <p class='titulo mt-4'> FAZER NOVO PEDIDO </p>

    <div class='m-3'>
        <form action="{{ route('pedidos.criar') }}" method="POST">
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
                                    <input type="text" class="form-control" value="{{$p->valor_formatado}}" readonly>
                                </div>    
                            </td>
                            <td> <input type='number' class='form-control' name='quantidade_{{ $p->id }}' min='0' value='0'> </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </form>

        <div class='d-grid gap-2'>
            <a href="{{ route('index') }}" class='btn btn-success btn-lg botao mt-3'> VOLTAR </a>
        </div>
    </div>

@stop