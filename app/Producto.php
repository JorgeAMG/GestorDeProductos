<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    //
    protected $fillable = ['nombre', 'codigo', 'existencias', 'bodega_id', 'descripcion', 'estado'];
    public function bodega()
    {

        return $this->belongsTo("App\Bodega");
    }
}
