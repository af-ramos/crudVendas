@extends('index')
@section('content')
    <p class='titulo mt-4'> LISTA DE PEDIDOS </p>
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <div class='m-3'>
        <table id='tabela-pedidos' class="cell-border stripe">
            <thead>
                <tr>
                    <th> Usuário </th>
                    <th> Status </th>
                    <th> Total </th>
                    <th> Criação </th>
                    <th> Atualização </th>
                    <th> Editar </th>
                    <th> Cancelar </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($pedidos as $p)
                    <tr>
                        <td> {{ $p->usuario }} </td>
                        <td> 
                            <select class="form-select" name="status" onchange="alterarStatus('{{ $p->id }}', this)" {{ $usuario->cargo != 2 ? 'disabled' : '' }}>
                                @foreach ($status as $s)
                                    <option value="{{ $s->id }}" {{$p->status == $s->id ? 'selected' : ''}}> {{ $s->descricao }} </option>
                                @endforeach
                            </select>
                        </td>

                        <td> {{ $p->total }} </td>
                        <td> {{ $p->created_at }} </td>
                        <td> {{ $p->updated_at }} </td>
    
                        @if($usuario->cargo == 2 || $p->status == 1)
                            <td> <a class="bi bi-gear-fill" style="font-size: 1.5rem" href="{{ route ('pedidos.telaAtualizar', ['id' => $p->id])}}"> </a> </td>
                            <td> 
                                <form action="{{ route('pedidos.remover', ['id' => $p->id]) }}" method="POST">
                                    @method('DELETE') 
                                    @csrf

                                    <button type="submit" class="bi bi-x-octagon-fill botao-remover" style="font-size: 1.5rem"> </button> 
                                </form>
                            </td>
                        @else
                            <td> - </td>
                            <td> - </td>
                        @endif
                    </tr>
                @endforeach
            </tbody>
        </table>

        <div class='d-grid gap-2'>
            <a href="{{ route('pedidos.telaCriar') }}" class='btn btn-primary btn-lg botao mt-3'> FAZER NOVO PEDIDO </a>
        </div>
    </div>
@stop