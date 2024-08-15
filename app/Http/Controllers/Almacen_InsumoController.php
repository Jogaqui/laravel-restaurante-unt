<?php

namespace App\Http\Controllers;

use App\Models\Almacen_Insumo;
use App\Models\Producto;
use Illuminate\Http\Request;

class Almacen_InsumoController extends Controller
{
    const PAGINATION = 8;

    public function index(Request $request)
    {
        //
        $buscarIn=$request->get('buscarIn');
        $insumoAlm=Almacen_Insumo::where('estado','=','1')->where('nombreIn','like','%'.$buscarIn.'%')->paginate($this::PAGINATION);
       
        return view('almacen.insumo.index',compact('insumoAlm','buscarIn'));
    }

    

    public function create()
    {
        //
      
        return view('almacen.insumo.create');
    }

    public function store(Request $request)
    {
        //
        $data=request()->validate([
           
            'nombreIn' =>  'required|max:30',
            'descripcionIn' => 'required|max:30',
            'fechaAdquisicion' => 'required|max:30',
            'fechaCaducidad' => 'required|max:30',
            'lote' => 'required|max:30',
            'stockIn' => 'required|max:30'
        
        ],
        [
            'nombreIn.required' => 'Ingrese nombre',
            'descripcionIn.max' => 'Máximo 50 caracteres para la descripción',
            'fechaAdquisicion.required' => 'Ingrese fecha válida',
            'lote.min' => 'Ingrese el lote',
            'stockIn.required' => 'Ingrese stock de insumo',
            'stockIn.min' => 'Ingrese stock positivo',
        ]);
        $insumoAlm = new Almacen_Insumo();
        $insumoAlm->nombreIn = $request->nombreIn;
        $insumoAlm->descripcionIn = $request->descripcionIn;
        $insumoAlm->fechaAdquisicion = $request->fechaAdquisicion;
        $insumoAlm->fechaCaducidad = $request->fechaCaducidad;
        $insumoAlm->lote = $request->lote;
        $insumoAlm->stockIn = $request->stockIn;
        $insumoAlm->estado = '1';
        $insumoAlm->save();
        return redirect()->route('insumoA.index')->with('datos','Insumo Nuevo Guardado ...!');

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
        $insumoAlm=Almacen_Insumo::findOrFail($id);
        return view('almacen.insumo.edit',compact('insumoAlm'));
    }

    public function update(Request $request, $id)
    {
        //
        $data=request()->validate([
           
            'nombreIn' =>  'required|max:30',
            'descripcionIn' => 'required|max:30',
            'fechaAdquisicion' => 'required|max:30',
            'fechaCaducidad' => 'required|max:30',
            'lote' => 'required|max:30',
            'stockIn' => 'required|max:30'
        
        ],
        [
            'nombreIn.required' => 'Ingrese nombre',
            'descripcionIn.max' => 'Máximo 50 caracteres para la descripción',
            'fechaAdquisicion.required' => 'Ingrese fecha válida',
            'lote.min' => 'Ingrese el lote',
            'stockIn.required' => 'Ingrese stock de insumo',
            'stockIn.min' => 'Ingrese stock positivo',
        ]);

        $insumoAlm = Almacen_Insumo::findOrFail($id);
        $insumoAlm->nombreIn = $request->nombreIn;
        $insumoAlm->descripcionIn = $request->descripcionIn;
        $insumoAlm->fechaAdquisicion = $request->fechaAdquisicion;
        $insumoAlm->fechaCaducidad = $request->fechaCaducidad;
        $insumoAlm->lote = $request->lote;
        $insumoAlm->stockIn = $request->stockIn;
        $insumoAlm->estado = '1';
        $insumoAlm->save();
        return redirect()->route('insumoA.index')->with('datos','Insumo Actualizado ...!');
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
        $insumoAlm=Almacen_Insumo::findOrFail($id);
        return view('almacen.insumo.confirmar',compact('insumoAlm'));
    }

    public function destroy($id)
    {
        //
        $insumoAlm=Almacen_Insumo::findOrFail($id);
        $insumoAlm->estado='0';
        $insumoAlm->save();
        return redirect()->route('insumoA.index')->with('datos','Insumo Eliminado ...!');
    }
}
