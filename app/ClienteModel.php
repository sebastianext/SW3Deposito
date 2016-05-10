<?php

namespace Deposito;

use Illuminate\Database\Eloquent\Model;

class ClienteModel extends Model
{
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table="clientes";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cedula', 'nombres', 'apellidos', 'direccion', 'telefono', 'correo'
    ];

}
