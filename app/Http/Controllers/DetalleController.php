<?php

namespace App\Http\Controllers;

use App\Models\Detalle;
use App\Models\Producto;
use App\Models\Pedido;

use Illuminate\Http\Request;

class DetalleController extends Controller
{
    public function index()
    {

    }
    public function lista($idpedido)
    {
        $pedido=Pedido::findOrFail($idpedido);
        $detalle = Detalle::where('idpedido','=',$idpedido)->get();
        return view('ventas.detalle.lista',compact('detalle','pedido'));
    }

    public function create()
    {
        $detalle = Detalle::all();
        $producto = Producto::all();
        $pedido = Pedido::all();
        return view('ventas.detalle.create',compact('detalle','producto','pedido'));
    }

    public function store(Request $request)
    {
        $detalle = new Detalle();
        $detalle->idpedido = $request->idpedido;
        $detalle->idproducto = request('idproducto');
        $producto = Producto::findOrFail($detalle->idproducto);
        $detalle->cantidad = request('cantidad');
        $detalle->precio = $producto->precio*$detalle->cantidad; 
        $auxpedido = Pedido::findOrFail($detalle->idpedido);
        $auxpedido->montoTotal +=$detalle->precio; 
//        $auxpedido->situacion =1; 
        $auxpedido->save();
        $detalle->save();
        $buscar=$request->get('buscar');
        $pedido=Pedido::where('estado','=','1')->where('idpedido','like','%'.$buscar.'%')->get();
        return view('ventas.pedidos.index',compact('pedido','buscar'));
    }

    public function destroy($id)
    {
        $detalle = Detalle::findOrFail($id);
        $detalle->delete();
        return redirect()->route('detalle.index',$detalle->pedido_id)->with('datos','Registro Eliminado..!');
    }

    public function confirmar($id)
    {
        $detalle = Detalle::findOrFail($id);
        return view('ventas.detalle.confirmar',compact('detalle'));
    }

    public function cancelar()
    {
        return redirect()->route('pedido.index')->with('datos','Acción Cancelada ..!');
    }

}
