<?php

namespace Deposito\Http\Controllers;

use Illuminate\Http\Request;

use Deposito\Http\Requests;
use Deposito\EntradaInventarioModel;

class PdfInventarioController extends Controller
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
        $data = EntradaInventarioModel::Productos();
        $date = date('Y-m-d');
        $titulo = "Listado de Inventario";
        $view =  \View::make('inventario.pdf.invoice', compact('data', 'date', 'titulo'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
      
        /** return $pdf->stream('invoice');*/
        return $pdf->download('Inventario.pdf');
    }

}
