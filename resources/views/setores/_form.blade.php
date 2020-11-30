@php
    $form_mode = !isset($form_mode) ? 'default' : $form_mode;
    switch ($form_mode) {
        case "delete":
            $action=route('setor.destroy', ['setor' => $setor->id]);
            $bot_label="Deletar setor";
            break;
        case "edit":
            $action=route('setor.update', ['setor' => $setor]); 
            $bot_label="Atualizar setor";
            break;
        default:
            $action=route("setor.store");
            $bot_label="Salvar setor";
            break;
    }
@endphp

<form action={{$action}} method="post">
    @csrf
    @if ($form_mode == "delete")
        @method('DELETE')
    @endif
    @if ($form_mode == "edit")
        @method('PUT')
    @endif
    <div>
        <label for="sigla">Sigla do Setor</label>
        <input type="text" id="sigla" name="sigla" {{isset($setor) ? 'value='.$setor->sigla : ''}} {{$form_mode == "delete" ? "disabled" : ""}}>
        @error('sigla')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="descricao">Descrição do Setor</label>
        <input type="text" id="descricao" name="descricao" {{isset($setor) ? 'value='.$setor->descricao : ''}} {{$form_mode == "delete" ? "disabled" : ""}}>
        @error('descricao')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="secao">Seção do Setor</label>
        <input type="text" id="secao" name="secao" {{isset($setor) ? 'value='.$setor->secao : ''}} {{$form_mode == "delete" ? "disabled" : ""}}>
        @error('secao')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="subsecao">Subseção do Setor</label>
        <input type="text" id="subsecao" name="subsecao" {{isset($setor) ? 'value='.$setor->subsecao : ''}} {{$form_mode == "delete" ? "disabled" : ""}}>
        @error('subsecao')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    @if ($form_mode == "delete")
        <div class="alert alert-danger" role="alert">Esta operação não poderá ser desfeita! Confirma a exclusão do setor?</div>
    @endif
    <div>
        <div class="form-group">
            <input type="submit" name="save_set" value="{{$bot_label}}">
            <input type="submit" name="cancel" value="Cancelar">
        </div>
    </div>
</form>
    