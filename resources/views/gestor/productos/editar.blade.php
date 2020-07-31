@extends('layouts.gestor')

@section('contenido')
<form action="{{ route('productos.update',$producto->id) }}" method="POST">

    @method('PUT')
    @csrf

    <div class="form-group">
        <label for="estado">Estado</label>
        <select class="form-control" name="estado" id="estado">
            <option value="Activo" @if ($producto->estado=='Activo')
                selected
                @endif>Activo</option>
            <option @if ($producto->estado=='Inactivo')
                selected
                @endif value="Inactivo">Inactivo</option>
            <option @if ($producto->estado=='Pendiente')
                selected
                @endif
                value="Pendiente">Pendiente</option>
        </select>
    </div>
    <button class="btn btn-info" type="submit">Actualizar</button>
</form>
@endsection