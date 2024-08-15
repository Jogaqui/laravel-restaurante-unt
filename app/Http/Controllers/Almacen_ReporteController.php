<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Almacen_Insumo;
use App\Models\Transporte_Producto;
use Illuminate\Http\Request;

class Almacen_ReporteController extends Controller
{
    public function generarReportePDFInsumo()
    {
        $insumoA = Almacen_Insumo::where('estado','=','1')->get();
        $totalinsumos = $insumoA->sum('cantidad');
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('almacen.reporte.insumos', compact('insumoA','totalinsumos'));

        return $pdf->download('reporte_inventario.pdf');
    }

    public function generarReportePDFProducto()
    {
        $productoA = Transporte_Producto::where('estado','=','1')->get();
      
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadView('almacen.reporte.productos', compact('productoA'));

        return $pdf->download('reporte_productos.pdf');
    }
}
