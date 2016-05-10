<?php
namespace Deposito;
use Illuminate\Database\Eloquent\Model;
use DB;

class EstadisticaModel extends Model
{
    protected $table="ventas_roductos";

    protected $fillable = [
        'cantidad','producto_id','venta_id'
    ];

    public static function Productos(){
        return DB::table('inventarios')
            ->join('productos','productos.id','=','inventarios.producto_id')
            ->select('productos.id','productos.nombre')
            ->distinct()
            ->get();
    }
    public static function Salidas(){
         // ->join('productos','productos.id','=','inventarios.producto_id')
        return DB::table('inventarios')
            ->select(DB::raw('SUM(ABS(inventarios.cantidad)) can','producto_id'))
            ->where('inventarios.operacion', '=', 0)
            ->groupBy('producto_id')
            ->orderBy('producto_id', 'asc')
            ->get();
    }

    public static function Entradas(){
         // ->join('productos','productos.id','=','inventarios.producto_id')
        return DB::table('inventarios')
            ->select(DB::raw('SUM(ABS(inventarios.cantidad)) can','producto_id'))
            ->where('inventarios.operacion', '=', 1)
            ->groupBy('producto_id')
            ->orderBy('producto_id', 'asc')
            ->get();
    }

    public static function Productos2(){
        return DB::table('inventarios')
            ->join('productos','productos.id','=','inventarios.producto_id')
            ->select('productos.nombre')
            ->distinct()
            ->orderBy('productos.id', 'asc')
            ->get();
    }

    public static function TopClientes(){
        return DB::table('ventas')
            ->join('clientes','clientes.id','=','ventas.cliente_id')
            ->select(DB::raw('SUM(ABS(ventas.total)) total,clientes.nombres cliente'))
            ->groupBy('cliente_id')
            ->orderBy('total', 'desc')
            ->get();
    }

    
}
