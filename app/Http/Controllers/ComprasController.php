<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Compra;
use App\Models\CompraDetalle;
use App\Models\CompraInsumo;
use App\Models\CompraProducto;
use App\Models\Producto;
use App\Models\Proveedor;
use App\Models\Transporte_Producto;
use DateTime;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class ComprasController extends Controller
{
    public function index(Request $request)
    {
        $buscarPr = $request->get('buscarporD');
        $compras = Compra::join('proveedores as p', 'p.id', 'compras.proveedor_id')
            ->where('p.razon_social', 'like', '%' . $buscarPr . '%')
            ->select('compras.id as compra_id', 'compras.*', 'p.*')
            ->paginate(8);

        return view('compras.index', compact('compras', 'buscarPr'));
    }

    public function create()
    {
        $proveedores = Proveedor::all();
        $productos = CompraProducto::where('estado', '=', '1')->get();
        $insumos = CompraInsumo::where('estado', '=', '1')->get();
        return view('compras.create', compact('proveedores', 'productos', 'insumos'));
    }

    public function store(Request $request)
    {
        $ids = $request->idproductos;
        $cantidades = $request->cantidadproductos;
        $precios = $request->preciosproductos;

        $new_codigos = $request->new_codigoproductos;
        $new_nombres = $request->new_nombres;
        $new_precios = $request->new_preciosproductos;
        $new_cantidades = $request->new_cantidadproductos;

        $compra = new Compra();
        $compra->fecha = $request->fecha;
        $compra->proveedor_id = $request->idpersona;
        $compra->user_id  = Auth::id();
        $compra->tipo_comprobante = $request->tipo_comprobante;
        $compra->serie_comprobante = $request->serie_comprobante;
        $compra->num_comprobante = $request->num_comprobante;
        $compra->total = 0;
        $compra->impuesto = 0;
        $compra->estado = 'PENDIENTE';
        $compra->save();

        if ($ids != null) {
            for ($i = 0; $i < count($ids); $i++) {
                $detalle_c = new CompraDetalle();
                $detalle_c->compra_id = $compra->id;
                $detalle_c->producto_id = $ids[$i];
                $detalle_c->cantidad = $cantidades[$i];
                $detalle_c->precio = $precios[$i];
                $detalle_c->estado = 5;
                $detalle_c->save();
                DB::table('compras')->where('id', $compra->id)->incrementEach([
                    'total' => $cantidades[$i] * $precios[$i],
                    'impuesto' => $cantidades[$i] * $precios[$i] * 0.18
                ]);

                DB::table('insumo')->where('idInsumo', $ids[$i])->increment('stockIn', $cantidades[$i]);
            }
        }

        if ($new_codigos != null) {
            for ($i = 0; $i < count($new_codigos); $i++) {

                $new_articulo = new CompraInsumo();
                $new_articulo->nombreIn = $new_nombres[$i];
                $new_articulo->precioIn = $new_precios[$i];
                $new_articulo->stockIn = $new_cantidades[$i];
                $new_articulo->estado = 1;
                $new_articulo->save();

                $detalle_c = new CompraDetalle();
                $detalle_c->compra_id = $compra->id;
                $detalle_c->producto_id = $new_articulo->idProducto;
                $detalle_c->cantidad = $new_cantidades[$i];
                $detalle_c->precio = $new_precios[$i];
                $detalle_c->estado = 5;
                $detalle_c->save();
                DB::table('compras')->where('id', $compra->id)->incrementEach([
                    'total' => $new_cantidades[$i] * $new_precios[$i],
                    'impuesto' => $new_cantidades[$i] * $new_precios[$i] * 0.18
                ]);
            }
        }
        return redirect()->route('compras.index');
    }

    public function show($id)
    {
        $usuario = Auth::user();
        $date = new DateTime();
        $date = $date->format("d/m/Y");
        $compra_details = DB::table('detalle_compra as dc')
            ->join('insumo as i', 'i.idInsumo', 'dc.producto_id')
            ->where('dc.compra_id', $id)
            ->select('dc.id', 'dc.cantidad as quantity', 'i.nombreIn as name', 'i.idInsumo as id', DB::raw('dc.cantidad * dc.precio as totalprice'), 'dc.estado')
            ->get();

        $compra = Compra::findOrFail($id);
        $compra->subtotal = $compra->total - $compra->impuesto;

        if ($compra->id < 10) {
            $num_compra = "#00000" . $compra->id;
        } else if ($compra->id > 9 && $compra->id < 100) {
            $num_compra = "#0000" . $compra->id;
        } else if ($compra->id > 99 && $compra->id < 1000) {
            $num_compra = "#000" . $compra->id;
        } else if ($compra->id > 999 && $compra->id < 10000) {
            $num_compra = "#00" . $compra->id;
        } else if ($compra->id > 9999 && $compra->id < 100000) {
            $num_compra = "#0" . $compra->id;
        } else if ($compra->id > 99999 && $compra->id < 1000000) {
            $num_compra = "#" . $compra->id;
        }
        return view('compras.show', compact('date', 'num_compra', 'compra', 'compra_details', 'usuario', 'id'));
    }

    public function generarReportePDFCompra($id)
    {
        $usuario = Auth::user();
        $date = new DateTime();
        $date = $date->format("d/m/Y");
        $compra_details = DB::table('detalle_compra as dc')
            ->join('insumo as i', 'i.idInsumo', 'dc.producto_id')
            ->where('dc.compra_id', $id)
            ->select('dc.id', 'dc.cantidad as quantity', 'i.nombreIn as name', 'i.idInsumo as id', DB::raw('dc.cantidad * dc.precio as totalprice'), 'dc.estado')
            ->get();

        $compra = Compra::findOrFail($id);
        $compra->subtotal = $compra->total - $compra->impuesto;

        if ($compra->id < 10) {
            $num_compra = "#00000" . $compra->id;
        } else if ($compra->id > 9 && $compra->id < 100) {
            $num_compra = "#0000" . $compra->id;
        } else if ($compra->id > 99 && $compra->id < 1000) {
            $num_compra = "#000" . $compra->id;
        } else if ($compra->id > 999 && $compra->id < 10000) {
            $num_compra = "#00" . $compra->id;
        } else if ($compra->id > 9999 && $compra->id < 100000) {
            $num_compra = "#0" . $compra->id;
        } else if ($compra->id > 99999 && $compra->id < 1000000) {
            $num_compra = "#" . $compra->id;
        }

        $pdf = Pdf::loadView('compras.print', compact('date', 'num_compra', 'compra', 'compra_details', 'usuario', 'id'));
        return $pdf->download('reporte_compra' . $id . '.pdf');
    }

    public function reportes()
    {
        $comprasPorMes = Compra::select(DB::raw('MONTH(fecha) as mes'), DB::raw('YEAR(fecha) as anio'), DB::raw('SUM(total) as total'))
            ->groupBy('mes', 'anio')
            ->get();
        return view('compras.reporte', compact('comprasPorMes'));
    }
}
