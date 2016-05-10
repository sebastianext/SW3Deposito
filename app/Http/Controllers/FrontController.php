<?php

namespace Deposito\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Deposito\Http\Requests;
use Deposito\EntradaInventarioModel;

class FrontController extends Controller
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
		$this->middleware('auth',['only'=>'inicio']);

	}
    public function index(){
    	if (Auth::check()) { 
           return view('index');
        }else{
    	   return view('welcome');
        }
    }

    public function inicio(){

    	return view('index');

    }
}
