@extends('index')
@section('content')
    <p class='titulo mt-4'> LISTA DE PEDIDOS </p>
    <div class='d-grid gap-2'>
        <a href="{{ route('pedidos.telaCriar') }}" class='btn btn-primary btn-lg botao m-3'> FAZER NOVO PEDIDO </a>
    </div>
@stop