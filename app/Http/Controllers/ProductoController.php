<?php

namespace Deposito\Http\Controllers;
use Session;
use Redirect;
use Illuminate\Http\Request;
use Deposito\Http\Requests;
use Deposito\ProductoModel;

class ProductoController extends Controller
{
    //
    /*

    */
    public function index(){
    	$productos= ProductoModel::All();
    	return view('producto.read',compact('productos'));
    }

    public function edit($id){
    	$producto= ProductoModel::find($id);
    	return view('producto.edit',['producto'=>$producto]);
    }

    public function create(){
    	return view('producto.create');
    }

	public function destroy($id){

    	ProductoModel::destroy($id);
    	Session::flash('mensaje','Elimino');
    	return Redirect::to('/producto');
    }

    public function update($id,Request $request){
    	$producto= ProductoModel::find($id);
    	$producto->fill($request->all());
    	$producto->save();
    	Session::flash('mensaje','edito');
    	return Redirect::to('/producto');
    }


    public function store(Request $request){
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
