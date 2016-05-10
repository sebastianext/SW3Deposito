<?php
namespace Deposito;
use Illuminate\Database\Eloquent\Model;
use DB;

class VentasProductosModel extends Model
{
    protected $table="ventas_roductos";

    protected $fillable = [
        'cantidad','producto_id','venta_id'
    ];

    public static function Ventas(){
        return DB::table('ventas_roductos')
            ->join('productos','productos.id','=','ventas_roductos.producto_id')
            ->select('productos.id','productos.nombre','ventas_roductos.cantidad','ventas_roductos.created_at')
            ->get();
    }
}
