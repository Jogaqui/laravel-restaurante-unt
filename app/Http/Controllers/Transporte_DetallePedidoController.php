<?php

namespace App\Http\Controllers;

use App\Models\Transporte_DetallePedido;
use App\Models\Transporte_Cliente;
use App\Models\Transporte_Pedido;
use App\Models\Transporte_Repartidor;
use Illuminate\Http\Request;

class Transporte_DetallePedidoController extends Controller
{
    const PAGINATION = 8;
    public function index(Request $request)
    {
        $buscarporDet = $request->get('buscarporDet');
        $detalleTQuery = Transporte_DetallePedido::where('estado', '=', '1');

        if ($buscarporDet) {
            $detalleTQuery->where('idDetalleP', 'like', '%' . $buscarporDet . '%');
        }

        $detalleT = $detalleTQuery->with('pedido.producto')->paginate($this::PAGINATION);

        return view('transporte.detalle.index', compact('buscarporDet', 'detalleT'));
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // Obtener todos los Pedidos con sus respectivos clientes usando eager loading (with)
        $pedidosConClientes = Transporte_Pedido::with('cliente')->where('estado', '=', '1')->get();
        $repartidorT = Transporte_Repartidor::where('estado', '=', '1')->get();
        return view('transporte.detalle.create', compact('repartidorT', 'pedidosConClientes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'idPedido' => 'required',
            'fechaPedido' => 'required',
            'modoPago' => 'required|max:30',
        ], [
            'idPedido.required' => 'Ingrese el ID del pedido',
            'fechaPedido.required' => 'Ingrese fecha de realización del pedido',
            'modoPago.required' => 'Ingrese modo de pago',
        ]);

        // Buscar el pedido correspondiente
        $pedidoT = Transporte_Pedido::findOrFail($request->idPedido);

        // Obtener el cliente asociado al pedido
        $clienteAsociado = $pedidoT->cliente;

        if (!$clienteAsociado) {
            // Manejar el caso cuando no se encuentre el cliente asociado al pedido
            return redirect()->back()->with('error', 'No se encontró información del cliente.');
        }

        // Obtener el producto asociado al detalle del pedido
        $productoAsociado = $pedidoT->producto;

        if (!$productoAsociado) {
            // Manejar el caso cuando no se encuentre el producto asociado al detalle del pedido
            return redirect()->back()->with('error', 'No se encontró información del producto.');
        }

        // Calcular el total a pagar multiplicando el precio del producto por la cantidad del pedido
        $precioProducto = $productoAsociado->precio;
        $cantidadProducto = $pedidoT->cantidad;
        $totalPagar = $precioProducto * $cantidadProducto;

        // Crear el detalle de pedido con los datos, incluido el total a pagar calculado
        $detalleT = new Transporte_DetallePedido();
        $detalleT->idPedido = $pedidoT->idPedido;
        $detalleT->idCliente = $clienteAsociado->idCliente;
        $detalleT->idRepartidor = $request->idRepartidor;
        $detalleT->fechaPedido = $request->fechaPedido;
        $detalleT->modoPago = $request->modoPago;
        $detalleT->totalPagar = $totalPagar;
        $detalleT->estado = 1;
        $detalleT->save();

        return redirect()->route('detalleT.index')->with('datos', 'Asignación realizada con éxito...');
    }





    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $clienteT = Transporte_Cliente::where('estado', '=', '1')->get();
        $pedidoT = Transporte_Pedido::where('estado', '=', '1')->get();
        $repartidorT = Transporte_Repartidor::where('estado', '=', '1')->get();
        $detalleT = Transporte_DetallePedido::findOrFail($id);
        return view('transporte.detalle.edit', compact('detalleT', 'clienteT', 'pedidoT', 'repartidorT'));
    }

    public function confirmar($id)
    {
        $detalleT = Transporte_DetallePedido::findOrFail($id);
        return view('transporte.detalle.confirmar', compact('detalleT'));
    }
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = request()->validate([
            'idPedido' => 'required', // Asegúrate de que el campo idPedido esté presente
            'fechaPedido' => 'required',
            'modoPago' => 'required|max:30',
            'totalPagar' => 'required|min:0'
        ], [
            'idPedido.required' => 'Ingrese el ID del pedido', // Mensaje de error personalizado
            'fechaPedido.required' => 'Ingrese fecha de realización del pedido',
            'modoPago.required' => 'Ingrese modo de pago',
            'totalPagar.required' => 'Ingrese el total a pagar'
        ]);

        $detalleT = Transporte_DetallePedido::findOrFail($id);
        $detalleT->idPedido = $request->idPedido; // Asignamos el valor de idPedido
        $detalleT->idCliente = $request->idCliente;
        $detalleT->idRepartidor = $request->idRepartidor;
        $detalleT->fechaPedido = $request->fechaPedido;
        $detalleT->modoPago = $request->modoPago;
        $detalleT->totalPagar = $request->totalPagar;
        $detalleT->save();

        return redirect()->route('detalleT.index')->with('datos', 'Asignación realizada con éxito...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $detalleT = Transporte_DetallePedido::findOrFail($id);
        $detalleT->estado = 0;
        $detalleT->save();
        return redirect()->route('detalleT.index')->with('datos', 'Registro eliminado...');
    }
}
