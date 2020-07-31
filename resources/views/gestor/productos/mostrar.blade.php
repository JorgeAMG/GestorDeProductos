@extends('layouts.gestor')

@section('contenido')
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Productos</h1>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="{{route('productos.create')}}" class="btn btn-primary">Crear Producto</a>
        </div>
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Producto</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Codigo</th>
                            <th>Existencias</th>
                            <th>Bodega</th>
                            <th>Descripcion</th>
                            <th>Estado</th>
                            <th>Editar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    @forelse ($productos as $producto)
                    <tbody>
                        <tr>
                            <td>{{$producto->nombre}}</td>
                            <td>{{$producto->codigo}}</td>
                            <td>{{$producto->existencias}}</td>
                            <td>{{$producto->bodega->nombre}}</td>
                            <td>{{$producto->descripcion}}</td>
                            <td>{{$producto->estado}}</td>
                            <td><a class="btn btn-info" href="{{route('productos.edit',$producto->id)}}">Editar</a></td>
                            <td>
                                <form action="{{route('productos.destroy',$producto->id)}}" method="post">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                    @empty
                    <tbody>
                        <h1>No existen productos porfavor crear uno</h1>
                    </tbody>
                    @endforelse

                </table>
            </div>
        </div>
    </div>

</div>
<!-- /.container-fluid -->
@endsection