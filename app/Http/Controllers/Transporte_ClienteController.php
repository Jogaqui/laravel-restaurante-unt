<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transporte_Cliente;

class Transporte_ClienteController extends Controller
{
    const PAGINATION = 10;

    public function index(Request $request)
    {
        //
        $buscarC=$request->get('buscarpor');
        $clienteT=Transporte_Cliente::where('estado','=','1')->where('nombre','like','%'.$buscarC.'%')->paginate($this::PAGINATION);
       
        return view('transporte.cliente.index',compact('clienteT','buscarC'));
    }

    

    public function create()
    {
        //
        return view('transporte.cliente.create');
    }

    public function store(Request $request)
    {
        //
        $data=request()->validate([
            'dni' => 'required|max:8',
            'nombre' => 'required|max:40',
            'direccion' => 'required|max:40',
            'correo' => 'required|max:40',
            'telefono' => 'required|max:12'
        ],
        [
            'dni.required' => 'Ingrese DNI de Cliente',
            'dni.max' => 'Máximo 8 caracteres para el dni',
            'nombre.required' => 'Ingrese Nombres de Cliente',
            'nombre.max' => 'Máximo 40 caracteres para el nombre',
            'direccion.required' => 'Ingrese direccion de Cliente',
            'direccion.max' => 'Máximo 40 caracteres para la direccion',
            'correo.required' => 'Ingrese correo de Cliente',
            'correo.max' => 'Máximo 40 caracteres para el correo',
            'telefono.required' => 'Ingrese telefono de Cliente',
            'telefono.max' => 'Máximo 12 caracteres para el telefono',
        ]);
        $clienteT = new Transporte_Cliente();
        $clienteT->dni = $request->dni;
        $clienteT->nombre = $request->nombre;
        $clienteT->direccion = $request->direccion;
        $clienteT->correo = $request->correo;
        $clienteT->telefono = $request->telefono;
        $clienteT->estado = '1';
        $clienteT->save();
        return redirect()->route('clienteT.index')->with('datos','Cliente Nuevo Guardado ...!');

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
        $clienteT=Transporte_Cliente::findOrFail($id);
        return view('transporte.cliente.edit',compact('clienteT'));
    }

    public function update(Request $request, $id)
    {
        //
        $data=request()->validate([
            'dni' => 'required|max:8',
            'nombre' => 'required|max:40',
            'direccion' => 'required|max:40',
            'correo' => 'required|max:40',
            'telefono' => 'required|max:12'
        ],
        [
            'dni.required' => 'Ingrese DNI de Cliente',
            'dni.max' => 'Máximo 8 caracteres para el dni',
            'nombre.required' => 'Ingrese Nombres de Cliente',
            'nombre.max' => 'Máximo 40 caracteres para el nombre',
            'direccion.required' => 'Ingrese direccion de Cliente',
            'direccion.max' => 'Máximo 40 caracteres para la direccion',
            'correo.required' => 'Ingrese correo de Cliente',
            'correo.max' => 'Máximo 40 caracteres para el correo',
            'telefono.required' => 'Ingrese telefono de Cliente',
            'telefono.max' => 'Máximo 12 caracteres para el telefono',
        ]);
        $clienteT=Transporte_Cliente::findOrFail($id);
        $clienteT->dni = $request->dni;
        $clienteT->nombre = $request->nombre;
        $clienteT->direccion = $request->direccion;
        $clienteT->correo = $request->correo;
        $clienteT->telefono = $request->telefono;
        $clienteT->save();
        return redirect()->route('clienteT.index')->with('datos','Cliente Actualizado ...!');
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
        $clienteT=Transporte_Cliente::findOrFail($id);
        return view('transporte.cliente.confirmar',compact('clienteT'));
    }

    public function destroy($id)
    {
        //
        $clienteT=Transporte_Cliente::findOrFail($id);
        $clienteT->estado='0';
        $clienteT->save();
        return redirect()->route('clienteT.index')->with('datos','Cliente Eliminado ...!');
    }

    // public function storemodel(Request $request)
    // {
    //     $data=request()->validate([
    //         'dni' => 'required|max:8',
    //         'nombres' => 'required|max:40',
    //         'direccion' => 'required|max:40',
    //         'email' => 'required|max:40',
    //         'telefono' => 'required|max:12'
    //     ],
    //     [
    //         'dni.required' => 'Ingrese DNI de Cliente',
    //         'dni.max' => 'Máximo 8 caracteres para el dni',
    //         'nombres.required' => 'Ingrese Nombres de Cliente',
    //         'nombres.max' => 'Máximo 40 caracteres para el nombre',
    //         'direccion.required' => 'Ingrese direccion de Cliente',
    //         'direccion.max' => 'Máximo 40 caracteres para la direccion',
    //         'email.required' => 'Ingrese email de Cliente',
    //         'email.max' => 'Máximo 40 caracteres para el email',
    //         'telefono.required' => 'Ingrese telefono de Cliente',
    //         'telefono.max' => 'Máximo 12 caracteres para el telefono',
    //     ]);
    //     $cliente = new Cliente();
    //     $cliente->dni = $request->dni;
    //     $cliente->nombres = $request->nombres;
    //     $cliente->direccion = $request->direccion;
    //     $cliente->email = $request->email;
    //     $cliente->telefono = $request->telefono;
    //     $cliente->estado = '1';
    //     $cliente->save();
    //     return redirect()->route('pedido.index')->with('datos','Cliente Nuevo Guardado ...!');
    // }
}
