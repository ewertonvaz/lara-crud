@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
        <h3>Editar Equipamento</h3>
    <form action={{route('equipamento.update', ['equipamento' => $eqp])}} method="post">
        @csrf
        @method('PUT')
        <input type="hidden" id="redirect_to" name="redirect_to" value={{URL::previous()}}>
        <input type="hidden" id="id" name="id" value={{$eqp->id}}>
        <div>
            <label for="tipo">Tipo Equipamento</label>
            <input type="text" id="tipo" name="tipo" value={{$eqp->tipo}}>
        </div>
        <div>
            <label for="modelo">Modelo Equipamento</label>
            <input type="text" id="modelo" name="modelo" value={{$eqp->modelo}}>
        </div>
        <div>
            <label for="fabricante">Fabricante Equipamento</label>
            <input type="text" id="fabricante" name="fabricante" value={{$eqp->fabricante}}>
        </div>
            <div class="form-group">
                <input type="submit" name="save_eqp" value="Atualizar equipamento">
                <input type="submit" name="cancel" value="Cancelar">
            </div>
        </div>
	</form>
</div>
@endsection
