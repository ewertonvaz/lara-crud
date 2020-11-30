@php
    $form_mode = !isset($form_mode) ? 'default' : $form_mode;
    switch ($form_mode) {
        case "delete":
            $action=route('equipamento.destroy', ['equipamento' => $eqp->id]);
            $bot_label="Deletar equipamento";
            break;
        case "edit":
            $action=route('equipamento.update', ['equipamento' => $eqp]); 
            $bot_label="Atualizar equipamento";
            break;
        default:
            $action=route("equipamento.store");
            $bot_label="Salvar equipamento";
            break;
    }
@endphp

<form action={{$action}} method="post">
    @csrf
    {{-- <input type="hidden" id="redirect_to" name="redirect_to" value={{$redirect_to ?? ''}}> --}}
    @if ($form_mode == "delete")
        @method('DELETE')
    @endif
    @if ($form_mode == "edit")
        @method('PUT')
    @endif
    {{-- @form_field('text,tipo,Tipo Equipamento') --}}
    <div>
        <label for="tipo">Tipo Equipamento</label>
        <input type="text" id="tipo" name="tipo" value="{{isset($eqp) ? $eqp->tipo : old('tipo')}}" {{$form_mode == "delete" ? "disabled" : ""}}>
        @error('tipo')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>

    <div>
        <label for="modelo">Modelo Equipamento</label>
        <input type="text" id="modelo" name="modelo" value="{{isset($eqp) ? $eqp->modelo : old('modelo')}}" {{$form_mode == "delete" ? "disabled" : ""}}>
        @error('modelo')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <label for="fabricante">Fabricante Equipamento</label>
        <input type="text" id="fabricante" name="fabricante" value="{{isset($eqp) ? $eqp->fabricante : old('fabricante')}}" {{$form_mode == "delete" ? "disabled" : ""}}>
        @error('fabricante')
            <div class="alert alert-danger">{{ $message }}</div>
        @enderror
    </div>
    @if ($form_mode == "delete")
        <div class="alert alert-danger" role="alert">Esta operação não poderá ser desfeita! Confirma a exclusão do equipamento?</div>
    @endif
    <div>
    	<div class="form-group">
			<input type="submit" name="save_eqp" value="{{$bot_label}}">
			<input type="submit" name="cancel" value="Cancelar"> {{-- onclick="btnClick(event)"> --}}
		</div>
	</div>
</form>

<script type="text/javascript">
    function btnClick(event) {
        event.preventDefault() ;
        alert("Operação cancelada pelo usuário");
        //sessionStorage.setItem("message", "Operação cancelada pelo usuário");
        window.history.back();
    }
</script>