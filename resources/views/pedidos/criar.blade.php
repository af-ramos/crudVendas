@extends('index')
@section('content')
    <p class='titulo mt-4'> FAZER NOVO PEDIDO </p>

    <div class='m-3'>
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
                        <td> {{$p->valor}} </td>
                        <td> 1 </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class='d-grid gap-2'>
            <a href="{{ route('index') }}" class='btn btn-success btn-lg botao mt-3'> VOLTAR </a>
        </div>
    </div>

@stop