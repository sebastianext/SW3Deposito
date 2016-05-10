<?php

namespace Deposito\Http\Controllers;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Deposito\Http\Requests;
use Deposito\Http\Requests\CreditoCreateRequest;
use Deposito\Http\Requests\CreditoUpdateRequest;
use Deposito\CreditoModel;
use Deposito\ClienteModel;

class CreditoController extends Controller
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
    	$creditos= CreditoModel::All();
    	return view('credito.read',compact('creditos'));
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
    	$credito= CreditoModel::find($id);
        $clientes =ClienteModel::lists('nombres','id');
    	return view('credito.edit',['credito'=>$credito,'clientes'=>$clientes]);
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
    	return view('credito.create',compact('clientes'));
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

    	CreditoModel::destroy($id);
    	Session::flash('mensaje','Elimino');
    	return Redirect::to('/credito');
    }
    /**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 08-04-2016 13:28
     *   Descripción: funcion que actualiza el registro en base de datos
     *
     * @return void
     */
    public function update($id,CreditoUpdateRequest $request){
    	$credito= CreditoModel::find($id);
    	$credito->fill($request->all());
    	$credito->save();
    	Session::flash('mensaje','edito');
    	return Redirect::to('/credito');
    }

    /**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 08-04-2016 13:28
     *   Descripción: funcion que almacena el registro en base de datos
     *
     * @return void
     */
    public function store(CreditoCreateRequest $request){
    	CreditoModel::create([
    		'valor'             =>$request['valor'],
    		'abono'             =>$request['abono'],
    		'tipo_contratacion' =>$request['tipo_contratacion'],
            'cliente_id'        =>$request['cliente_id'],
            'descripcion'       =>$request['descripcion']
    	]);

    	return redirect('/credito')->with('mensaje','ingreso');
    }
}
