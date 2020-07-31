@extends('layouts.gestor')

@section('contenido')
<div class="container-fluid">
    <form action="{{ route('bodegas.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="nombre">Nombre de la bodega</label>
            <input class="form-control" type="text" name="nombre" id="nombre">
        </div>
        <button class="btn btn-primary" type="submit">Enviar</button>
    </form>
</div>
@endsection