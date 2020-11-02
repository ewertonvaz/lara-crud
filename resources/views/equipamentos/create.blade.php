@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			<h3>Novo Equipamento</h3>
			@include('equipamentos._form')
		</div>
	</div>
@endsection