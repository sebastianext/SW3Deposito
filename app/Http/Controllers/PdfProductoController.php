<?php

namespace Deposito\Http\Controllers;

use Illuminate\Http\Request;

use Deposito\Http\Requests;
use Deposito\ProductoModel;

class PdfProductoController extends Controller
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
        $data = ProductoModel::All();
        $date = date('Y-m-d');
        $titulo = "Listado de Productos";
        $view =  \View::make('producto.pdf.invoice', compact('data', 'date', 'titulo'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->download('productos.pdf');
    }
   
}
