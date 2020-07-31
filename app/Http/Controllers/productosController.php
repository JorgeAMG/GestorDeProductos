<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

use App\Producto;
use App\Bodega;

class productosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (!empty(Session::get('bodega_id'))) {
            $productos = Producto::where('bodega_id', Session::get('bodega_id'))->get();
            return view('gestor.productos.mostrar', compact('productos'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $bodegaId = Session::get('bodega_id');
        return view('gestor.productos.crear', compact('bodegaId'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $producto = new Producto($request->all());

        $producto->save();
        $productos = Producto::where('bodega_id', Session::get('bodega_id'))->get();
        return view('gestor.productos.mostrar', compact('productos'));
    }

    public function edit($id)
    {
        //
        $producto = Producto::where("id", $id)->first();

        return view('gestor.productos.editar', compact('producto'));
    }


    public function update(Request $request, $id)
    {
        //
        $producto = Producto::findOrFail($id);
        $producto->fill($request->all());
        $producto->save();
        $productos = Producto::where('bodega_id', Session::get('bodega_id'))->get();
        return view('gestor.productos.mostrar', compact('productos'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $producto = Producto::findOrFail($id);
        $producto->delete();
        $productos = Producto::where('bodega_id', Session::get('bodega_id'))->get();
        return view('gestor.productos.mostrar', compact('productos'));
    }
}
