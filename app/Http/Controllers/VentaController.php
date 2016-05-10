<?php

namespace Deposito\Http\Controllers;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Deposito\Http\Requests;
use Deposito\VentaModel;
use Deposito\ProductoModel;
use Deposito\ClienteModel;
use Deposito\VentasProductosModel;
use Deposito\EntradaInventarioModel;

use DB;

class VentaController extends Controller
{
    /**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 08-04-2016 13:28
     *   Descripción: contrucntor
     *
     * @return void
     */
     public function __construct(){
        $this->middleware('auth');
    }
    /**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 08-04-2016 13:28
     *   Descripción: funcion que retorna la lista de registros a la vista perteneciente
     *
     * @return void
     */
    public function index(){ 
        $ventas= VentasProductosModel::Ventas();
        return view('ventas.read',compact('ventas'));
    }

    public function detalle(){
             
        return view('venta.detalle');

    }

    /**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 08-04-2016 13:28
     *   Descripción: funcion que retorna la vista de crear
     *
     * @return void
     */
    public function create(){
        $clientes =ClienteModel::lists('nombres','id');
        $productos=ProductoModel::lists('nombre','id');
    	return view('ventas.create',compact(['clientes','productos']));
    }

   

    public function leerProducto($id){
        $producto= ProductoModel::find($id);
        return response()->json([
                $producto->toArray()
            ]);
    }

    public function disponible($id){
        return EntradaInventarioModel::DisponibleProductos($id);
        
    }

    /**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 08-04-2016 13:28
     *   Descripción: funcion que almacena el registro en base de datos
     *
     * @return void
     */

    public function store(Request $request){

        $id = DB::table('ventas')->insertGetId([
            'total' => $request['total'], 
            'cliente_id' => $request['cliente'],
        ]);

        $arr=json_decode($request['productos']);
        foreach ($arr as $producto) {
            VentasProductosModel::create([
                'cantidad'=> $producto->cant,
                'producto_id' => $producto->id,
                'venta_id' =>$id
            ]);
            EntradaInventarioModel::create([
            'cantidad'         =>-$producto->cant,
            'operacion'        =>0,
            'producto_id'      =>$producto->id,
        ]);
        }
    	return redirect('/venta')->with('mensaje','ingreso');
    }
}
