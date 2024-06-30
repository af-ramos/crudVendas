@extends('index')
@section('content')
    <p class='titulo mt-4'> ATUALIZAR PEDIDO </p>

    <div class='m-3'>
        <form action="{{ route('pedidos.atualizar', ['id' => $pedido->id]) }}" method="POST">
            @method('PUT')
            @csrf

            <table id='tabela-produtos' class="cell-border stripe">
                <thead>
                    <tr>
                        <th> ID </th>
                        <th> Descrição </th>
                        <th> Preço do Dia </th>
                        <th> Preço Atual </th>
                        <th> Quantidade </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($produtos as $p)
                        <tr>
                            <td> {{ $p->id }} </td>
                            <td> {{ $p->descricao }} </td>
                            <td>
                                <input type="hidden" value="{{ isset($preco_produto[$p->id]) ? $preco_produto[$p->id] : $p->valor }}" name="prod_{{ $p->id }}[valor_dia]">
                                {{ isset($preco_dia_formatado_produto[$p->id]) ? $preco_dia_formatado_produto[$p->id] : $p->valor_formatado }}
                            </td>
                            <td>
                                <input type="hidden" value="{{ $p->valor }}" name="prod_{{ $p->id }}[valor_atual]">
                                {{ $p->valor_formatado }}
                            </td>
                            <td> <input type='number' class='form-control' name="prod_{{ $p->id }}[quantidade]" min='0' value="{{ isset($quantidade_produto[$p->id]) ? $quantidade_produto[$p->id] : 0 }}"> </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <div class='d-grid gap-2 mt-3'>
                <button type='submit' class='btn btn-success btn-lg botao'> ALTERAR PEDIDO </button>
            </div>
        </form>

        <div class='d-grid gap-2 mt-3'>
            <a href="{{ route('pedidos.mostrar') }}" class='btn btn-danger btn-lg botao'> VOLTAR </a>
        </div>
    </div>

@stop