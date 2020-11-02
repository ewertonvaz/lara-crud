@extends('layouts.app')
@section('content')
    <div class="container">
        <div class="row">
            <h3>Editar Equipamento</h3>
            <?php $form_mode = "edit" ?>
            @include('equipamentos._form')
        </div>
    </div>
@endsection
