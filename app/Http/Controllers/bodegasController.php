<?php

namespace App\Http\Controllers;

use App\Bodega;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Session;

class bodegasController extends Controller
{

    public function create()
    {
        //
        return view('gestor.bodegas.crear');
    }
    public function show($id)
    {
        //

        Session::put('bodega_id', $id);

        return redirect()->route('productos.index');
    }
    public function store(Request $request)
    {
        //
        $request->validate([
            'nombre' => 'required|unique:bodegas,nombre'
        ]);
        $bodega = new Bodega($request->all());
        $bodega->save();

        $bodegas = Bodega::all();
        return view('gestor.inicio', compact('bodegas'));
    }


    public function destroy($id)
    {
        //
        $bodega = Bodega::findOrFail($id);

        $bodega->delete();
        $bodegas = Bodega::all();
        return view('gestor.inicio', compact('bodegas'));
    }
}
