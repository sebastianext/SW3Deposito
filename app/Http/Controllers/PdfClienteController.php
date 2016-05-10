<?php

namespace Deposito\Http\Controllers;

use Illuminate\Http\Request;

use Deposito\Http\Requests;
use Deposito\ClienteModel;

class PdfClienteController extends Controller
{	
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
