@extends('layouts.gestor')

@section('contenido')

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Bodegas</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('bodegas.create')}}" class="btn btn-primary">Crear bodega</a>
        </div>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Primero debes crear una bodega para incluir productos</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Eliminar</th>
                            <th colspan="3">Productos</th>
                        </tr>
                    </thead>
                    @forelse ($bodegas as $bodega)
                    <tbody>
                        <tr>
                            <td>{{$bodega->nombre}}</td>
                            <td>
                                <form action="{{route('bodegas.destroy',$bodega->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                            </td>

                            <td>
                                <a class="btn btn-secondary" href="{{route('bodegas.show',$bodega->id)}}">
                                    Productos
                                </a>
                            </td>
                        </tr>
                    </tbody>
                    @empty
                    <tbody>
                        <h1>No existen bodegas por favor crear una </h1>
                    </tbody>
                    @endforelse

                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection