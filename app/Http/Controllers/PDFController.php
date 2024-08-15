<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Solicitar;
use App\Models\Detalle;
use App\Models\Mesa;
use App\Models\Producto;
use App\Models\Cliente;
use App\Models\Categoria;
use App\Models\Pedido;
use Barryvdh\DomPDF\Facade\Pdf;

class PDFController extends Controller
{
    public function generatePDF($id)
    {   
        // recuperamos el registro, usamos el namespace (\App\) si no añadiste el modelo Puo en los use
        $cliente=Cliente::all();
        $pedido=Pedido::findOrFail($id);
        $detalle = Detalle::where('idpedido','=',$id)->get();

        // creamos y almacenamos la vista
        $vista = view('boleta')
                ->with('pedido', $pedido)
                ->with('cliente', $cliente)
                ->with('detalle', $detalle);

        // Generamos el pdf pasandole la vista
        $pdf =  PDF::loadHTML($vista)->setOptions(['defaultFont' => 'sans-serif']);

        // retornamos la salida del pdf
        return $pdf->stream('boleta.pdf');
    }

}
