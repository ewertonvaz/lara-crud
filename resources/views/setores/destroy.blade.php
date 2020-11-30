@extends('layouts.app')
@section('content')
<div class="container">
	<div class="row">
		<h3>Deletar Setor</h3>
		<form action={{route('setor.destroy', ['setor' => $setor->id])}} method="post">
            @csrf
            @method('DELETE')
			<input type="hidden" id="redirect_to" name="redirect_to" value={{URL::previous()}}>
			<div>
				<label for="sigla">Sigla setor</label>
				<input type="text" id="sigla" name="sigla" value={{$setor->sigla}} disabled>
			</div>
			<div>
				<label for="descricao">Descrição setor</label>
				<input type="text" id="descricao" name="descricao" value={{$setor->descricao}} disabled>
			</div>
			<div>
				<label for="secao">Seção setor</label>
				<input type="text" id="secao" name="secao" value={{$setor->secao}} disabled>
            </div>
            <div>
				<label for="subsecao">Subeção setor</label>
				<input type="text" id="subsecao" name="subsecao" value={{$setor->subsecao}} disabled>
			</div>
            <div class="alert alert-danger" role="alert">Esta operação não poderá ser desfeita! Confirma a exclusão do setor?</div>
			<div class="form-group">
				<input type="submit" name="delete_set" value="Deletar setor">
				<input type="submit" name="cancel" value="Cancelar">
            </div>
		</div>
	</form>
</div>
@endsection
