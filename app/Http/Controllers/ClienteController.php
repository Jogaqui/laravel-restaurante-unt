<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;


class ClienteController extends Controller
{
    const PAGINATION = 10;

    public function index(Request $request)
    {
        //
        $buscar=$request->get('buscarpor');
        $cliente=Cliente::where('estado','=','1')->where('nombres','like','%'.$buscar.'%')->paginate($this::PAGINATION);
       
        return view('ventas.cliente.index',compact('cliente','buscar'));
    }

    

    public function create()
    {
        //
        return view('ventas.cliente.create');
    }

    public function store(Request $request)
    {
        //
        $data=request()->validate([
            'dni' => 'required|max:8',
            'nombres' => 'required|max:40',
            'direccion' => 'required|max:40',
            'email' => 'required|max:40',
            'telefono' => 'required|max:12'
        ],
        [
            'dni.required' => 'Ingrese DNI de Cliente',
            'dni.max' => 'Máximo 8 caracteres para el dni',
            'nombres.required' => 'Ingrese Nombres de Cliente',
            'nombres.max' => 'Máximo 40 caracteres para el nombre',
            'direccion.required' => 'Ingrese direccion de Cliente',
            'direccion.max' => 'Máximo 40 caracteres para la direccion',
            'email.required' => 'Ingrese email de Cliente',
            'email.max' => 'Máximo 40 caracteres para el email',
            'telefono.required' => 'Ingrese telefono de Cliente',
            'telefono.max' => 'Máximo 12 caracteres para el telefono',
        ]);
        $cliente = new Cliente();
        $cliente->dni = $request->dni;
        $cliente->nombres = $request->nombres;
        $cliente->direccion = $request->direccion;
        $cliente->email = $request->email;
        $cliente->telefono = $request->telefono;
        $cliente->estado = '1';
        $cliente->save();
        return redirect()->route('cliente.index')->with('datos','Cliente Nuevo Guardado ...!');

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
        $cliente=Cliente::findOrFail($id);
        return view('ventas.cliente.edit',compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        //
        $data=request()->validate([
            'dni' => 'required|max:8',
            'nombres' => 'required|max:40',
            'direccion' => 'required|max:40',
            'email' => 'required|max:40',
            'telefono' => 'required|max:12'
        ],
        [
            'dni.required' => 'Ingrese DNI de Cliente',
            'dni.max' => 'Máximo 8 caracteres para el dni',
            'nombres.required' => 'Ingrese Nombres de Cliente',
            'nombres.max' => 'Máximo 40 caracteres para el nombre',
            'direccion.required' => 'Ingrese direccion de Cliente',
            'direccion.max' => 'Máximo 40 caracteres para la direccion',
            'email.required' => 'Ingrese email de Cliente',
            'email.max' => 'Máximo 40 caracteres para el email',
            'telefono.required' => 'Ingrese telefono de Cliente',
            'telefono.max' => 'Máximo 12 caracteres para el telefono',
        ]);
        $cliente=Cliente::findOrFail($id);
        $cliente->dni = $request->dni;
        $cliente->nombres = $request->nombres;
        $cliente->direccion = $request->direccion;
        $cliente->email = $request->email;
        $cliente->telefono = $request->telefono;
        $cliente->save();
        return redirect()->route('cliente.index')->with('datos','Cliente Actualizado ...!');
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
        $cliente=Cliente::findOrFail($id);
        return view('ventas.cliente.confirmar',compact('cliente'));
    }

    public function destroy($id)
    {
        //
        $cliente=Cliente::findOrFail($id);
        $cliente->estado='0';
        $cliente->save();
        return redirect()->route('cliente.index')->with('datos','Cliente Eliminado ...!');
    }

    public function storemodel(Request $request)
    {
        $data=request()->validate([
            'dni' => 'required|max:8',
            'nombres' => 'required|max:40',
            'direccion' => 'required|max:40',
            'email' => 'required|max:40',
            'telefono' => 'required|max:12'
        ],
        [
            'dni.required' => 'Ingrese DNI de Cliente',
            'dni.max' => 'Máximo 8 caracteres para el dni',
            'nombres.required' => 'Ingrese Nombres de Cliente',
            'nombres.max' => 'Máximo 40 caracteres para el nombre',
            'direccion.required' => 'Ingrese direccion de Cliente',
            'direccion.max' => 'Máximo 40 caracteres para la direccion',
            'email.required' => 'Ingrese email de Cliente',
            'email.max' => 'Máximo 40 caracteres para el email',
            'telefono.required' => 'Ingrese telefono de Cliente',
            'telefono.max' => 'Máximo 12 caracteres para el telefono',
        ]);
        $cliente = new Cliente();
        $cliente->dni = $request->dni;
        $cliente->nombres = $request->nombres;
        $cliente->direccion = $request->direccion;
        $cliente->email = $request->email;
        $cliente->telefono = $request->telefono;
        $cliente->estado = '1';
        $cliente->save();
        return redirect()->route('pedido.index')->with('datos','Cliente Nuevo Guardado ...!');
    }
}
