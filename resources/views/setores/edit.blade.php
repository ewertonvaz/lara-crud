@extends('layouts.app')

@section('content')
<div class="container">
	<div class="row">
        <h3>Editar Setor</h3>
    <form action={{route('setor.update', ['setor' => $setor])}} method="post">
        @csrf
        @method('PUT')
        <input type="hidden" id="redirect_to" name="redirect_to" value={{URL::previous()}}>
        <input type="hidden" id="id" name="id" value={{$setor->id}}>
        <div>
            <label for="sigla">Sigla setor</label>
            <input type="text" id="sigla" name="sigla" value="{{$setor->sigla}}">
        </div>
        <div>
            <label for="descricao">Descrição setor</label>
            <input type="text" id="descricao" name="descricao" value="{{$setor->descricao}}">
        </div>
        <div>
            <label for="subsecao">Seção setor</label>
            <input type="text" id="secao" name="secao" value="{{$setor->secao}}">
        </div>
        <div>
            <label for="subsecao">Subeção setor</label>
            <input type="text" id="subsecao" name="subsecao" value="{{$setor->subsecao}}">
        </div>
            <div class="form-group">
                <input type="submit" name="save_set" value="Atualizar setor">
                <input type="submit" name="cancel" value="Cancelar">
            </div>
        </div>
	</form>
</div>
@endsection