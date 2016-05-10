<?php

namespace Deposito\Http\Controllers;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Deposito\Http\Requests;
use Deposito\EntradaInventarioModel;
use Deposito\ProductoModel;


class InventarioController extends Controller
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
    	$productosInventario= EntradaInventarioModel::Productos();
    	return view('inventario.read',compact('productosInventario'));
    }

    public function detalle(){
             
        return view('inventario.detalle');

    }
    /**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 08-04-2016 13:28
     *   Descripción: funcion que retorna el registro para poder editarlo
     *
     * @return void
     */
    public function edit($id){

        $entradas= EntradaInventarioModel::EntradasProductos($id);
        $salidas = EntradaInventarioModel::SalidaProductos($id);
    
        $a = array();
         
        foreach ($entradas as $entrada) {
           $a['entradas']=$entrada->cantidad;
        }
        foreach ($salidas as $salida) {
           $a['salidas'] = $salida->cantidad;
        }
       
        $a['disponibles'] = $a['entradas']-$a['salidas'];
        $stocks=json_encode($a);

        $detalles=EntradaInventarioModel::DetallesProductos($id);
        return view('inventario.detalle',['stocks'=>$stocks,'detalles'=>$detalles]);
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
        $productos=ProductoModel::lists('nombre','id');
    	return view('inventario.create',compact('productos'));
    }
    /**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 08-04-2016 13:28
     *   Descripción: funcion que eliminar el registro 
     *
     * @return void
     */
	public function destroy($id){

    	EntradaInventarioModel::destroy($id);
    	Session::flash('mensaje','Elimino');
    	return Redirect::to('/inventario');
    }
    /**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 08-04-2016 13:28
     *   Descripción: funcion que actualiza el registro en base de datos
     *
     * @return void
     */
    public function update($id,Request $request){
    	$inventario= EntradaInventarioModel::find($id);
    	$inventario->fill($request->all());
    	$inventario->save();
    	Session::flash('mensaje','edito');
    	return Redirect::to('/inventario');
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
    	EntradaInventarioModel::create([
    		'cantidad'         =>$request['cantidad'],
    		'operacion'        =>1,
    		'producto_id'      =>$request['producto_id']
    	]);

    	return redirect('/inventario')->with('mensaje','ingreso');
    }
}
