@extends('index')
@section('content')
	<h2> USUÁRIOS </h2>

	<div class='m-3'>
		<table id="tabela-usuarios" class="cell-border stripe">
			<thead>
				<tr>
					<th> Nome </th>
					<th> Documento </th>
					<th> Telefone </th>
					<th> Usuário </th>
					<th> Cargo </th>
					<th> Criação </th>
					<th> Atualização </th>
					<th> Editar </th>
				</tr>
			</thead>
			<tbody>
				@foreach ($usuarios as $u)
					<tr>
						<td> {{ $u->nome }}  </td>
						<td> {{ $u->documento }}  </td>
						<td> {{ $u->telefone }}  </td>
						<td> {{ $u->usuario }}  </td>
						<td> {{ $u->cargo }}  </td>
						<td> {{ $u->created_at }} </td>
						<td> {{ $u->updated_at }} </td>
						<td> <a class="bi bi-gear-fill" style="font-size: 1.5rem" href="{{ route ('usuarios.telaAtualizar', ['id' => $u->id])}}"> </a> </td>
					</tr>
				@endforeach
			</tbody>
		</table>
	</div>
@stop