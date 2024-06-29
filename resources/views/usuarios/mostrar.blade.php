@extends('index')
@section('content')
	<h2> USUÁRIOS </h2>

	@foreach ($usuarios as $u)
		<p>
			Nome: {{ $u->nome }} / Usuário: {{ $u->usuario }} 
			<a href="{{ route ('usuarios.telaAtualizar', ['id' => $u->id])}}"> Editar </a> 
		</p>
	@endforeach
@stop