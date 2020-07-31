@extends('layouts.gestor')

@section('contenido')
<div class="container-fluid">
    <form action="{{ route('productos.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label class="form-label" for="nombre">Nombre</label>
            <input class="form-control" type="text" name="nombre" id="nombre">
        </div>
        <div class="form-group">
            <label class="form-label" for="codigo">codigo</label>
            <input class="form-control" type="number" name="codigo" id="codigo">
        </div>
        <div class="form-group">
            <label class="form-label" for="existencias">existencias</label>
            <input class="form-control" type="number" name="existencias" id="existencias">
        </div>
        <div class="form-group">
            <label class="form-label" for="descripcion">Descripcion</label>
            <input class="form-control" type="text" name="descripcion" id="descripcion">
        </div>
        <div class="form-group">
            <input hidden class="form-control" type="text" name="bodega_id" value="{{$bodegaId}}">
        </div>
        <div class="form-group">
            <label for="estado">Estado</label>
            <select class="form-control" name="estado" id="estado">
                <option value="Activo">Activo</option>
                <option value="Inactivo">Inactivo</option>
                <option value="Pendiente">Pendiente</option>
            </select>
        </div>
        <button class="btn btn-primary" type="submit">Enviar</button>
    </form>
</div>
@endsection