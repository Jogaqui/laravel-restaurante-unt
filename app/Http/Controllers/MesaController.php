<?php

namespace App\Http\Controllers;

use App\Models\Mesa;
use App\Models\Mozo;
use App\Models\Pedido;
use App\Models\Mozo_mesa;
use Illuminate\Http\Request;


class MesaController extends Controller
{
    const PAGINATION = 10;
    public function index(Request $request)
    {
        //
        $buscar=$request->get('buscar');
        $mesas=Mesa::where('estado','=','1')->where('idmesa','like','%'.$buscar.'%')->paginate($this::PAGINATION);
       
        return view('ventas.mesa.index',compact('mesas','buscar'));
    }

    public function mesas(Request $request){
        $buscar2=$request->get('buscar2');
        $mesas=Mesa::where('estado','=','1')->where('idmesa','like','%'.$buscar2.'%')->paginate($this::PAGINATION);
       
        return view('ventas.mesa.mesas',compact('mesas','buscar2'));
    }
    

    public function create()
    {
        //
        //$mozos=Mozo::all();
        $pedidos=Pedido::all();;
        return view('ventas.mesa.create', compact('pedidos'));
    }

    public function store(Request $request)
    {
        //
        $data=request()->validate([

        ],
        [
    
        ]);
        $mesa = new Mesa();

        if($request->idpedido>0)
        {
            $mesa->disponibilidad = '0';
            $mesa->idpedido = $request->idpedido;
        }
        else
        {
            $mesa->disponibilidad = '1';
            $mesa->idpedido = null;
        }
        
        $mesa->estado = '1';
        $mesa->save();
        return redirect()->route('mesa.index')->with('datos','Mesa Nueva Guardada ...!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        //$mozos=Mozo::all();
        $pedidos=Pedido::all();
        $mesa=Mesa::findOrFail($id);
        return view('ventas.mesa.edit',compact('mesa','pedidos'));
    }

    public function update(Request $request, $id)
    {
        //
        $data=request()->validate([
     
        ],
        [

        ]);

        $mesa=Mesa::findOrFail($id);
        
        if($request->idpedido>0)
        {
            $mesa->disponibilidad = '0';
            $mesa->idpedido = $request->idpedido;
        }
        else
        {
            $mesa->disponibilidad = '1';
            $mesa->idpedido = null;
        }

        $mesa->save();
        return redirect()->route('mesa.index')->with('datos','Mesa Actualizada ...!');

    }


    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirmar($id)
    {
        //confirmar eliminación (destroy)
        $mesa=Mesa::findOrFail($id);
        return view('ventas.mesa.confirmar',compact('mesa'));
    }

    public function destroy($id)
    {
        //
        $mesa=Mesa::findOrFail($id);
        $mesa->estado='0';
        $mesa->save();
        return redirect()->route('mesa.index')->with('datos','Mesa Eliminada ...!');
    }

    public function limpiar($id)
    {
        //
        $mesa=Mesa::findOrFail($id);
        $mesa->idpedido=null;
        $mesa->disponibilidad=1;
        $mesa->save();
        return redirect()->route('mesa.index')->with('datos','Mesa Limpiada ...!');
    }
}
