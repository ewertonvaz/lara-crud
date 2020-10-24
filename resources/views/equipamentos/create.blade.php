@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
		<h3>Novo Equipamento</h3>
		@include('equipamentos._form')
		<div class="form-group">
			<input type="submit" name="save_eqp" value="Salvar equipamento">
			<input type="submit" name="cancel" value="Cancelar">
		</div>
	</div>
	</form>
</div>
@endsection