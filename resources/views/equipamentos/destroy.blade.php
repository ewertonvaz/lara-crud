@extends('layouts.app')
@section('content')
	<div class="container">
		<div class="row">
			{{Session::pull('message')}}
			<h3>Deletar Equipamento</h3>
			<?php $form_mode = "delete" ?>
			@include('equipamentos._form')
		</div>
	</div>
@endsection