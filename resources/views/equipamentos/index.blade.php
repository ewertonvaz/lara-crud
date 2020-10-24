@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<h3>Listagem de Equipamentos</h3>
		</div>
		<div class="col-md-8">
			<a href="{{route('equipamento.create')}}" class="btn btn-primary">Incluir Equipamento</a>
		</div>
	</div>
    <div class="row">
    	<table class="table table-striped">
    		<thead>
    			<tr>
    				<th>Id</th>
    				<th>Tipo</th>
    				<th>Modelo</th>
					<th>Fabricante</th>
    				<th>Ações</th>
    			</tr>
    		</thead>
    		<tbody>
    		@foreach($equipamentos as $equipamento)
    			<tr>
    				<td>{{ $equipamento->id }}</td>
    				<td>{{ $equipamento->tipo }}</td>
    				<td>{{ $equipamento->modelo }}</td>
					<td>{{ $equipamento->fabricante }}</td>
    				<td>
    					<ul class="list-inline">
    						<li>
    						<a href="{{route('equipamento.edit', ['equipamento' => $equipamento])}}">Editar</a>
    						</li>
    						<li>
    						<a href="{{route('equipamento.delete', ['equipamento' => $equipamento])}}">Deletar</a>
							</li>
    					</ul>
    				</td>
    			</tr>
    		@endforeach
    		</tbody>
        </table>
        {{$equipamentos->links()}}
    </div>
</div>
@endsection
