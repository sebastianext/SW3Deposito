<?php

namespace Deposito;

use Illuminate\Database\Eloquent\Model;

class CreditoModel extends Model
{
	/**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table="creditos";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'valor', 'abono', 'tipo_contratacion', 'cliente_id', 'descripcion'
    ];

}
