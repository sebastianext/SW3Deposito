<?php

namespace Deposito\Http\Controllers;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Deposito\Http\Requests;
use Deposito\Http\Requests\ClienteCreateRequest;
use Deposito\Http\Requests\ClienteUpdateRequest;
use Deposito\ClienteModel;

class ClienteController extends Controller
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
    	$clientes= ClienteModel::All();
    	return view('cliente.read',compact('clientes'));
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
    	$cliente= ClienteModel::find($id);
    	return view('cliente.edit',['cliente'=>$cliente]);
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
    	return view('cliente.create');
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

    	ClienteModel::destroy($id);
    	Session::flash('mensaje','Elimino');
    	return Redirect::to('/cliente');
    }
    /**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 08-04-2016 13:28
     *   Descripción: funcion que actualiza el registro en base de datos
     *
     * @return void
     */
    public function update($id,ClienteUpdateRequest $request){
    	$cliente= ClienteModel::find($id);

    	$cliente->fill($request->all());
    	$cliente->save();
    	Session::flash('mensaje','edito');
    	return Redirect::to('/cliente');
    }

    /**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 08-04-2016 13:28
     *   Descripción: funcion que almacena el registro en base de datos
     *
     * @return void
     */

    public function store(ClienteCreateRequest $request){
    	ClienteModel::create([
    		'cedula'  =>$request['cedula'],
    		'nombres'=>$request['nombres'],
    		'apellidos'=>$request['apellidos'],
            'direccion'  =>$request['direccion'],
            'telefono'=>$request['telefono'],
            'correo'=>$request['correo']
    	]);

    	return redirect('/cliente')->with('mensaje','ingreso');
    }

    /**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 08-04-2016 13:28
     *   Descripción: funcion que permite descargar el listado de registros en pdf
     *
     * @return void
     */
     public function invoice() {
        $data = ClienteModel::All();
        $date = date('Y-m-d');
        $titulo = "Listado de Clientes";
        $view =  \View::make('cliente.pdf.invoice', compact('data', 'date', 'titulo'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
      
        return $pdf->download('clientes.pdf');
    }
}
