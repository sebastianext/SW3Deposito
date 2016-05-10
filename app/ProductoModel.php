<?php

namespace Deposito;

use Illuminate\Database\Eloquent\Model;

class ProductoModel extends Model
{
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table="productos";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nombre', 'preciocompra', 'precioventa', 'minimoinventario', 'descripcion'
    ];

}
