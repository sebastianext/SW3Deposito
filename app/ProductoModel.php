<?php

namespace Deposito;

use Illuminate\Database\Eloquent\Model;

class ProductoModel extends Model
{
    protected $table="productos";

    protected $fillable = [
        'nombre', 'preciocompra', 'precioventa', 'minimoinventario', 'descripcion'
    ];

}
