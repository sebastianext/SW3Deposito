<?php

namespace Deposito\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Session;
use Deposito\Http\Requests;
use Deposito\EstadisticaModel;

class EstadisticaController extends Controller
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

    public function index(){
        $salidasArray;
        $entradasArray;
        $nombres=EstadisticaModel::Productos2();
        foreach ($nombres as $nombre) { 
                $categoryArray[]=$nombre->nombre;
        }
        $salidas=EstadisticaModel::Salidas();
        foreach ($salidas as $salida) { 
                $salidasArray[]= (int)$salida->can;
        }
        $entradas=EstadisticaModel::Entradas();
        foreach ($entradas as $entrada) { 
                $entradasArray[]= (int)$entrada->can;
        }
      
        $yourFirstChart["chart"] = array("type" => "bar");
        $yourFirstChart["title"] = array("text" => "Movimientos Productos");
        $yourFirstChart["xAxis"] = array("categories" => $categoryArray);
        $yourFirstChart["yAxis"] = array("title" => array("text" => "Unidades"));

        $yourFirstChart["series"] = [
            array("name" => "Salidas", "color"=> "#F44336", "data" => $salidasArray),
            array("name" => "Entradas","color"=> "#2196F3", "data" => $entradasArray)
        ];


        $clientes=EstadisticaModel::TopClientes();
        foreach ($clientes as $cliente) { 
                $cateClienteArray[]=$cliente->cliente;
                $totalArray[]=(int)$cliente->total;
        }
        
        $clientesGrafica["chart"] = array("type" => "column");
        $clientesGrafica["title"] = array("text" => "Top 5 Clientes");
        $clientesGrafica["xAxis"] = array("categories" => $cateClienteArray);
        $clientesGrafica["yAxis"] = array("title" => array("text" => "Total Pesos"));
        $clientesGrafica["tooltip"] = array("pointFormat" => "Total: <b>$ {point.y:.f}</b> Pesos");
      
        $clientesGrafica["series"] = [
            array("name" => "Clientes",  "color"=> "rgb(67, 67, 72)","data" => $totalArray)
        ];
        
        return view('estadistica.estadistica', compact(['yourFirstChart','clientesGrafica']));
     
       
    }
}
