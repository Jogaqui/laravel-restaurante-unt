<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use App\Models\Transporte_Cliente;
use App\Models\Transporte_Pedido;
use App\Models\Transporte_Producto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ConsoleTVs\Charts\Facades\Charts;
class Transporte_PedidoController extends Controller
{
    const PAGINATION = 8;
    public function index(Request $request)
    {
        $buscarporDe = $request->get('buscarporDe');
        $pedidoT = Transporte_Pedido::where('estado', '=', '1')->where('idPedido', 'like', '%' . $buscarporDe . '%')->paginate($this::PAGINATION);
        return view('transporte.pedido.index', compact('buscarporDe', 'pedidoT'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $clienteT = Transporte_Cliente::where('estado', '=', '1')->get();
        $productoT = Transporte_Producto::where('estado', '=', '1')->get();
        return view('transporte.pedido.create', compact('clienteT', 'productoT'));
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
            'cantidad' => 'required|min:1',
        ], [
            'cantidad.required' => 'Ingrese cantidad de pedidos',
        ]);

        // Buscar el producto correspondiente al pedido
        $producto = Transporte_Producto::findOrFail($request->idProducto);

        // Validar si hay suficiente stock disponible
        if ($producto->stock < $request->cantidad) {
            return redirect()->back()->with('error', 'No hay suficiente stock disponible para realizar el pedido.');
        }

        // Crear el registro del pedido
        $pedidoT = new Transporte_Pedido();
        $pedidoT->idCliente = $request->idCliente;
        $pedidoT->idProducto = $request->idProducto;
        $pedidoT->cantidad = $request->cantidad;
        $pedidoT->estado = 1;
        $pedidoT->save();

        // Actualizar el stock del producto disminuyendo la cantidad del pedido
        $producto->stock -= $request->cantidad;
        $producto->save();

        return redirect()->route('pedidoT.index')->with('datos', 'Asignación realizada con éxito...');
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
        $productoT = Transporte_Producto::where('estado', '=', '1')->get();
        $pedidoT = Transporte_Pedido::findOrFail($id);
        return view('transporte.pedido.edit', compact('pedidoT', 'clienteT', 'productoT'));
    }

    public function confirmar($id)
    {
        $pedidoT = Transporte_Pedido::findOrFail($id);
        return view('transporte.pedido.confirmar', compact('pedidoT'));
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
        $data = request()->validate(
            [
                'cantidad' => 'required|min:1',
            ],
            [
                'cantidad.required' => 'Ingrese cantidad de pedidos',
            ]
        );
        $pedidoT = Transporte_Pedido::findOrFail($id);
        $pedidoT->idCliente = $request->idCliente;
        $pedidoT->idProducto = $request->idProducto;
        $pedidoT->cantidad = $request->cantidad;
        $pedidoT->save();
        return redirect()->route('pedidoT.index')->with('datos', 'Asignacion realizada con exito...');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pedidoT = Transporte_Pedido::findOrFail($id);
        $pedidoT->estado = 0;
        $pedidoT->save();
        return redirect()->route('pedidoT.index')->with('datos', 'Registro eliminado...');
    }

    public function dashboard()
    {

    }
}
