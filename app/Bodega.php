<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bodega extends Model
{
    //
    protected $fillable = ['nombre'];
    public function productos()
    {

        return $this->hasMany("App\Producto");
    }
}
