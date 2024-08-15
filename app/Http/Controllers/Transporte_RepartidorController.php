<?php

namespace App\Http\Controllers;

use App\Models\Transporte_Repartidor;
use Illuminate\Http\Request;

class Transporte_RepartidorController extends Controller
{
    const PAGINATION = 10;

    public function index(Request $request)
    {
        //
        $buscar=$request->get('buscarpor');
        $repartidor=Transporte_Repartidor::where('estado','=','1')->where('nombres','like','%'.$buscar.'%')->paginate($this::PAGINATION);

        return view('transporte.repartidor.index',compact('repartidor','buscar'));
    }



    public function create()
    {
        //
        return view('transporte.repartidor.create');
    }

    public function store(Request $request)
    {
        //
        $data=request()->validate([
            'dni' => 'required|max:8',
            'nombres' => 'required|max:40',
            'direccion' => 'required|max:40',
            'email' => 'required|max:40',
            'telefono' => 'required|max:12',
            'sueldo' => 'required|numeric|regex:/^\d+(\.\d+)?$/',
            'vehiculo'=>'required|max:30',
            'placa'=>'required|max:10'

        ],
        [
            'dni.required' => 'Ingrese DNI de repartidor',
            'dni.max' => 'Máximo 8 caracteres para el dni',
            'nombres.required' => 'Ingrese Nombres de repartidor',
            'nombres.max' => 'Máximo 40 caracteres para el nombre',
            'direccion.required' => 'Ingrese direccion de repartidor',
            'direccion.max' => 'Máximo 40 caracteres para la direccion',
            'email.required' => 'Ingrese correo de repartidor',
            'email.max' => 'Máximo 40 caracteres para el email',
            'telefono.required' => 'Ingrese telefono de repartidor',
            'telefono.max' => 'Máximo 12 caracteres para el telefono',
            'sueldo' => 'Ingrese sueldo del repartidor',
            'sueldo.max' =>'Solo se permite numeros enteros y decimales',
            'vehiculo' => 'Ingrese vehiculo del repartidor',
            'vehiculo.max' =>'Máximo 30 caracteres',
            'placa' => 'Ingrese placa del vehiculo',
            'placa.max' =>'Máximo 10 caracteres'
        ]);
        $repartidor = new Transporte_Repartidor();
        $repartidor->dni = $request->dni;
        $repartidor->nombres = $request->nombres;
        $repartidor->direccion = $request->direccion;
        $repartidor->email = $request->email;
        $repartidor->telefono = $request->telefono;
        $repartidor->sueldo = $request->sueldo;
        $repartidor->vehiculo = $request->vehiculo;
        $repartidor->placa = $request->placa;
        $repartidor->estado = '1';
        $repartidor->save();
        return redirect()->route('repartidor.index')->with('datos','Repartidor Nuevo Guardado ...!');

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
        $repartidor=Transporte_Repartidor::findOrFail($id);
        return view('transporte.repartidor.edit',compact('repartidor'));
    }

    public function update(Request $request, $id)
    {
        //
        $data=request()->validate([
            'dni' => 'required|max:8',
            'nombres' => 'required|max:40',
            'direccion' => 'required|max:40',
            'email' => 'required|max:40',
            'telefono' => 'required|max:12',
            'sueldo' => 'required|numeric|regex:/^\d+(\.\d+)?$/',
            'vehiculo'=>'required|max:30',
            'placa'=>'required|max:10'
        ],
        [
            'dni.required' => 'Ingrese DNI de repartidor',
            'dni.max' => 'Máximo 8 caracteres para el dni',
            'nombres.required' => 'Ingrese Nombres de repartidor',
            'nombres.max' => 'Máximo 40 caracteres para el nombre',
            'direccion.required' => 'Ingrese direccion de repartidor',
            'direccion.max' => 'Máximo 40 caracteres para la direccion',
            'email.required' => 'Ingrese correo de repartidor',
            'email.max' => 'Máximo 40 caracteres para el email',
            'telefono.required' => 'Ingrese telefono de repartidor',
            'telefono.max' => 'Máximo 12 caracteres para el telefono',
            'sueldo' => 'Ingrese sueldo del repartidor',
            'sueldo.max' =>'Solo se permite numeros enteros y decimales',
            'vehiculo' => 'Ingrese vehiculo del repartidor',
            'vehiculo.max' =>'Máximo 30 caracteres',
            'placa' => 'Ingrese placa del vehiculo',
            'placa.max' =>'Máximo 10 caracteres'

        ]);
        $repartidor=Transporte_Repartidor::findOrFail($id);
        $repartidor->dni = $request->dni;
        $repartidor->nombres = $request->nombres;
        $repartidor->direccion = $request->direccion;
        $repartidor->email = $request->email;
        $repartidor->telefono = $request->telefono;
        $repartidor->sueldo = $request->sueldo;
        $repartidor->vehiculo = $request->vehiculo;
        $repartidor->placa = $request->placa;
        $repartidor->save();
        return redirect()->route('repartidor.index')->with('datos','Repartidor Actualizado ...!');
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
        $repartidor=Transporte_Repartidor::findOrFail($id);
        return view('transporte.repartidor.confirmar',compact('repartidor'));
    }

    public function destroy($id)
    {
        //
        $repartidor=Transporte_Repartidor::findOrFail($id);
        $repartidor->estado='0';
        $repartidor->save();
        return redirect()->route('repartidor.index')->with('datos','Repartidor Eliminado ...!');
    }
}
