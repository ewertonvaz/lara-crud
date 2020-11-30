@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-md-4">
			<h3>Listagem de Setores</h3>
		</div>
		<div class="col-md-8">
			<a href="{{route('setor.create')}}" class="btn btn-primary">Incluir Setor</a>
		</div>
	</div>
    <div class="row">
        {{$setores->links()}}
    	<table class="table table-striped">
    		<thead>
    			<tr>
    				<th>Id</th>
    				<th>Sigla</th>
    				<th>Descrição</th>
					<th>Seção</th>
    				<th>Subseção</th>
    			</tr>
    		</thead>
    		<tbody>
    		@foreach($setores as $setor)
    			<tr>
    				<td>{{ $setor->id }}</td>
    				<td>{{ $setor->sigla }}</td>
    				<td>{{ $setor->descricao }}</td>
                    <td>{{ $setor->secao }}</td>
					<td>{{ $setor->subsecao }}</td>
    				<td>
    					<ul class="list-inline">
    						<li>
    						<a href="{{route('setor.edit', ['setor' => $setor])}}">Editar</a>
    						</li>
    						<li>
    						<a href="{{route('setor.delete', ['setor' => $setor])}}">Deletar</a>
							</li>
    					</ul>
    				</td>
    			</tr>
    		@endforeach
    		</tbody>
    	</table>
    </div>
</div>
@endsection
