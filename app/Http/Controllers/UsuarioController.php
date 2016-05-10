<?php

namespace Deposito\Http\Controllers;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Deposito\Http\Requests;
use Deposito\Http\Requests\UsuarioCreateRequest;
use Deposito\Http\Requests\UsuarioUpdateRequest;
use Deposito\User;

class UsuarioController extends Controller
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
    	$usuarios= User::All();
    	return view('usuario.read',compact('usuarios'));
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
    	$usuario= User::find($id);
    	return view('usuario.edit',['usuario'=>$usuario]);
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
    	return view('usuario.create');
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

    	User::destroy($id);
    	
    	Session::flash('mensaje','Elimino');
    	return Redirect::to('/usuario');
    }
    /**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 08-04-2016 13:28
     *   Descripción: funcion que actualiza el registro en base de datos
     *
     * @return void
     */
    public function update($id,UsuarioUpdateRequest $request){
    	$usuario= User::find($id);
    	$usuario->fill($request->all());
    	$usuario->save();
    	Session::flash('mensaje','edito');
    	return Redirect::to('/usuario');
    }
    /**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 08-04-2016 13:28
     *   Descripción: funcion que almacena el registro en base de datos
     *
     * @return void
     */

    public function store(UsuarioCreateRequest $request){
    	User::create([
    		'name'  =>$request['name'],
    		'email'=>$request['email'],
    		'password'=>bcrypt($request['password'])
    	]);

    	return redirect('/usuario')->with('mensaje','ingreso');
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
        $data = User::All();
        $date = date('Y-m-d');
        $titulo = "Listado de usuarios";
        $view =  \View::make('usuario.pdf.invoice', compact('data', 'date', 'titulo'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
    
        return $pdf->download('usuarios.pdf');
    }
}
