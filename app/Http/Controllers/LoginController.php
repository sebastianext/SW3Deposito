<?php

namespace Deposito\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Redirect;
use Deposito\Http\Requests;
use Deposito\Http\Requests\LoginRequest;

class LoginController extends Controller
{   
    /**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 08-04-2016 13:28
     *   Descripción: funcion que almacena el registro en base de datos
     *
     * @return void
     */
    public function store(LoginRequest $request){
        
    	if(Auth::attempt(['email'=>$request['email'], 'password'=>$request['password']])){
            return Redirect::to('inicio');
        }
        Session::flash('message-error','Datos son incorrectos');
        
        return Redirect::to('/');
    }

    /**
     *   Autor:Johan Sebastian Quintero
     *   Versión: v1.0
     *   Fecha: 08-04-2016 13:28
     *   Descripción: funcion que sirve para cerrar la sesion de usuario
     *
     * @return void
     */
    public function logout(){
        Auth::logout();
        return Redirect::to('/');
    }
}
