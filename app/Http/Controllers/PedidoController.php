<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Pedido;
use App\Models\Mesa;
use App\Models\Detalle;
use App\Models\PedidoDetalle;
use App\Models\Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PedidoController extends Controller
{
    const PAGINATION = 20;
    public function index(Request $request)
    {
        $buscar = $request->get('buscar');
        $pedido = Pedido::where('estado', '=', '1')->where('idpedido', 'like', '%' . $buscar . '%')->paginate($this::PAGINATION);
        return view('ventas.pedidos.index', compact('pedido', 'buscar'));
    }

    public function create()
    {
        $cliente = Cliente::all();
        $productos = Producto::all();
        return view('ventas.pedidos.create', compact('cliente', 'productos'));
    }

    public function create2($id)
    {
        $mesa = Mesa::FindOrFail($id);

        $cliente = Cliente::all();
        return view('ventas.pedidos.create2', compact('cliente', 'mesa'));
    }

    public function store(Request $request)
    {
        $data = request()->validate([
            'medioPago' => 'required',
            'modalidad' => 'required',

        ], [
            'medioPago.required' => 'Elija un medio de Pago',
            'modalidad.required' => 'Elija una modalidad',
        ]);
        $pedido = new Pedido();

        if ($request->idcliente > 0) {
            $pedido->situacion = '0';
            $pedido->idcliente = $request->idcliente;
        } else {
            $pedido->situacion = '0';
            $pedido->idcliente = null;
        }
        $pedido->montoTotal = 0;
        $pedido->observaciones = $request->observaciones;
        $pedido->medioPago = $request->medioPago;
        $pedido->modalidad = $request->modalidad;
        $pedido->estado = '1';
        $pedido->save();

        if (!empty($request->idproductos) && is_array($request->idproductos)) {
            for ($i = 0; $i < count($request->idproductos); $i++) {
                $pedido_detalle = new PedidoDetalle();
                $pedido_detalle->idpedido = $pedido->idpedido;
                $pedido_detalle->idproducto = $request->idproductos[$i];
                $pedido_detalle->cantidad = $request->cantidadproductos[$i];
                $pedido_detalle->precio = $request->preciosproductos[$i];
                $pedido_detalle->importe = $request->preciosproductos[$i] * $request->cantidadproductos[$i];
                $pedido_detalle->save();

                DB::table('pedido')->where('idpedido', $pedido->idpedido)->increment('montoTotal', $request->preciosproductos[$i] * $request->cantidadproductos[$i]);
            }
        }

        return redirect()->route('pedido.index')->with('datos', 'Pedido Nuevo Guardado ...!');
    }

    public function store2(Request $request, $id)
    {
        $data = request()->validate([
            'medioPago' => 'required',
            'modalidad' => 'required',


        ], [
            'medioPago.required' => 'Elija un medio de Pago',
            'modalidad.required' => 'Elija una modalidad',
        ]);
        $pedido = new Pedido();

        if ($request->idcliente > 0) {
            $pedido->situacion = '0';
            $pedido->idcliente = $request->idcliente;
        } else {
            $pedido->situacion = '0';
            $pedido->idcliente = null;
        }
        $pedido->montoTotal = $request->montoToatl;
        $pedido->observaciones = $request->observaciones;
        $pedido->medioPago = $request->medioPago;
        $pedido->modalidad = $request->modalidad;
        $pedido->estado = '1';
        $pedido->save();
        $mesa = Mesa::FindOrFail($id);
        $mesa->idpedido = $pedido->idpedido;
        $mesa->disponibilidad = 0;
        $mesa->save();
        return redirect()->route('pedido.index')->with('datos', 'Pedido Nuevo Guardado ...!');
    }

    public function show($id)
    {
        $pedido = Pedido::findOrFail($id);
        return view('ventas.pedidos.show', compact('pedido'));
    }

    public function edit($id)
    {
        $cliente = Cliente::all();
        $pedido = Pedido::findOrFail($id);
        return view('ventas.pedidos.edit', compact('pedido', 'cliente'));
    }
    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'medioPago' => 'required',
            'modalidad' => 'required',

        ], [
            'medioPago.required' => 'Elija un medio de Pago',
            'modalidad.required' => 'Elija una modalidad',
        ]);
        $pedido = Pedido::findOrFail($id);

        if ($request->idcliente > 0) {
            $pedido->situacion = '0';
            $pedido->idcliente = $request->idcliente;
        } else {
            $pedido->situacion = '0';
            $pedido->idcliente = null;
        }

        $pedido->montoTotal = $request->montoToatl;
        $pedido->observaciones = $request->observaciones;
        $pedido->medioPago = $request->medioPago;
        $pedido->modalidad = $request->modalidad;
        $pedido->save();
        return redirect()->route('pedido.index')->with('datos', 'Pedido Actualizado ...!');
    }

    public function update2(Request $request, $id)
    {
        $data = request()->validate([
            'medioPago' => 'required',
            'modalidad' => 'required',

        ], [
            'medioPago.required' => 'Elija un medio de Pago',
            'modalidad.required' => 'Elija una modalidad',
        ]);
        $pedido = Pedido::findOrFail($id);

        if ($request->idcliente > 0) {
            $pedido->situacion = '0';
            $pedido->idcliente = $request->idcliente;
        } else {
            $pedido->situacion = '0';
            $pedido->idcliente = null;
        }

        $pedido->medioPago = $request->medioPago;
        $pedido->modalidad = $request->modalidad;
        $pedido->save();
        return redirect()->route('pedido.index')->with('datos', 'Pedido Actualizado ...!');
    }

    public function confirmar($id)
    {
        //confirmar eliminación (destroy)
        $pedido = Pedido::findOrFail($id);
        return view('ventas.pedidos.confirmar', compact('pedido'));
    }

    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->estado = '0';
        $pedido->save();
        return redirect()->route('pedido.index')->with('datos', 'Pedido Eliminado ...!');
    }

    public function editpago($id)
    {

        $cliente = Cliente::all();
        $pedido = Pedido::findOrFail($id);
        $detalle = Detalle::where('idpedido', '=', $id)->get();
        if ($pedido->idcliente != null) {
            return view('ventas.pedidos.pago', compact('pedido', 'cliente', 'detalle'));
        } else {
            echo "<script>alert('No se puede generar Pago, ingrese Cliente');</script>";
            return redirect()->route('pedido.index');
        }
    }

    public function actualizarpedido($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->situacion = '1';
        $pedido->save();
        return redirect()->route('pedido.index')->with('datos', 'Pedido Actualizado ...!');
    }
}
