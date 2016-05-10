<?php

namespace Deposito\Http\Controllers;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Deposito\Http\Requests;
use Deposito\Http\Requests\ProductoCreateRequest;
use Deposito\Http\Requests\ProductoUpdateRequest;
use Deposito\ProductoModel;

class ProductoController extends Controller
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
    	$productos= ProductoModel::All();
    	return view('producto.read',compact('productos'));
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
    	$producto= ProductoModel::find($id);
    	return view('producto.edit',['producto'=>$producto]);
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
    	return view('producto.create');
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

    	ProductoModel::destroy($id);
    	Session::flash('mensaje','Elimino');
    	return Redirect::to('/producto');
    }
    /**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 08-04-2016 13:28
     *   Descripción: funcion que actualiza el registro en base de datos
     *
     * @return void
     */
    public function update($id,ProductoUpdateRequest $request){
    	$producto= ProductoModel::find($id);
    	$producto->fill($request->all());
    	$producto->save();
    	Session::flash('mensaje','edito');
    	return Redirect::to('/producto');
    }
    /**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 08-04-2016 13:28
     *   Descripción: funcion que almacena el registro en base de datos
     *
     * @return void
     */

    public function store(ProductoCreateRequest $request){
    	ProductoModel::create([
    		'nombre'           =>$request['nombre'],
    		'preciocompra'     =>$request['preciocompra'],
    		'precioventa'      =>$request['precioventa'],
            'minimoinventario' =>$request['minimoinventario'],
            'descripcion'      =>$request['descripcion']
    	]);

    	return redirect('/producto')->with('mensaje','ingreso');
    }
}
