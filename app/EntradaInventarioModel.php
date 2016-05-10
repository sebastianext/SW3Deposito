<?php

namespace Deposito;
use DB;

use Illuminate\Database\Eloquent\Model;

class EntradaInventarioModel extends Model
{
	/**
     * The database table used by the model.
     *
     * @var string
     */ 
    protected $table="inventarios";
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'cantidad', 'operacion', 'producto_id'
    ];

    /**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 08-04-2016 13:28
     *   Descripción: funcion que retorna la lista de productos con la cantidad disponoble
     *
     * @return void
     */
	public static function Productos(){
		return DB::table('inventarios')
		    ->join('productos','productos.id','=','inventarios.producto_id')
			->select(DB::raw('SUM(inventarios.cantidad) as cantidad,producto_id,productos.nombre'))
            ->groupBy('producto_id')
            ->get();
	}
	/**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 08-04-2016 13:28
     *   Descripción: funcion que retorna la lista productos disponibles
     *
     * @return void
     */
	public static function DisponibleProductos($id){
		return DB::table('inventarios')
		    ->join('productos','productos.id','=','inventarios.producto_id')
			->select(DB::raw('SUM(inventarios.cantidad) as cantidad,producto_id'))
			->where('producto_id', '=', $id)
            ->groupBy('producto_id')
            ->get();
	}
	/**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 08-04-2016 13:28
     *   Descripción: funcion que retorna el nombre del producto
     *
     * @return void
     */
	public static function NombreProducto($id){
		return DB::table('inventarios')
			->join('productos','productos.id','=','inventarios.producto_id')
			->select('productos.nombre,productos.id')
            ->where('producto_id', '=', $id)
            ->get();
	}
	/**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 08-04-2016 13:28
     *   Descripción: funcion que retorna la cantidad unidades de entrada
     *
     * @return void
     */
	public static function EntradasProductos($id){
		return DB::table('inventarios')
			->select(DB::raw('SUM(inventarios.cantidad) as cantidad'))
            ->where('inventarios.producto_id', '=', $id)
            ->where('inventarios.operacion', '=', 1)
            ->get();
	}
	/**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 08-04-2016 13:28
     *   Descripción: funcion que retorna la cantidad de unidades de salida
     *
     * @return void
     */
	public static function SalidaProductos($id){
		return DB::table('inventarios')
			->select(DB::raw('SUM(ABS(inventarios.cantidad)) as cantidad'))
            ->where('inventarios.producto_id', '=', $id)
            ->where('inventarios.operacion', '=', 0)
            ->get();
	}
	/**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 08-04-2016 13:28
     *   Descripción: funcion que retorna la lista de productos con la operacion de movimiento
     *
     * @return void
     */
	public static function DetallesProductos($id){
		return DB::table('inventarios')
			->select(DB::raw('ABS(inventarios.cantidad) as cantidad,CASE operacion  WHEN 1 THEN "Entrada" ELSE "Salida" END as operacion'))
            ->where('inventarios.producto_id', '=', $id)
            ->get();
	}

}
