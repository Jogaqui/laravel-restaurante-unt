<?php

namespace App\Http\Controllers;

use App\Models\Transporte_Producto;
use Illuminate\Http\Request;

class Transporte_ProductoController extends Controller
{
    const PAGINATION = 8;

    public function index(Request $request)
    {
        //
        $buscarPr=$request->get('buscarporD');
        $productoT=Transporte_Producto::where('estado','=','1')->where('descripcion','like','%'.$buscarPr.'%')->paginate($this::PAGINATION);
       
        return view('transporte.producto.index',compact('productoT','buscarPr'));
    }

    

    public function create()
    {
        //
        return view('transporte.producto.create');
    }

    public function store(Request $request)
    {
        //
        $data=request()->validate([
            'descripcion' => 'required|max:30',
            'precio' => 'required|min:0',
            'stock' => 'required|min:0'
        ],
        [
            'descripcion.required' => 'Ingrese descripción de Categoría',
            'descripcion.max' => 'Máximo 30 caracteres para la descripción',
            'precio.required' => 'Ingrese precio de Producto',
            'precio.min' => 'Ingrese precio positivo',
            'stock.required' => 'Ingrese stock de Producto',
            'stock.min' => 'Ingrese stock positivo',
        ]);
        $productoT = new Transporte_Producto();
        $productoT->descripcion = $request->descripcion;
        $productoT->precio = $request->precio;
        $productoT->stock = $request->stock;
        $productoT->estado = '1';
        $productoT->save();
        return redirect()->route('productoT.index')->with('datos','Producto Nuevo Guardado ...!');

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
        $productoT=Transporte_Producto::findOrFail($id);
        return view('transporte.producto.edit',compact('productoT'));
    }

    public function update(Request $request, $id)
    {
        //
        $data=request()->validate([
            'descripcion' => 'required|max:30',
            'precio' => 'required|min:0',
            'stock' => 'required|min:0'
        ],
        [
            'descripcion.required' => 'Ingrese descripción de Categoría',
            'descripcion.max' => 'Máximo 30 caracteres para la descripción',
            'precio.required' => 'Ingrese precio de Producto',
            'precio.min' => 'Ingrese precio positivo',
            'stock.required' => 'Ingrese stock de Producto',
            'stock.min' => 'Ingrese stock positivo',
        ]);

        $productoT = Transporte_Producto::findOrFail($id);
        $productoT->descripcion = $request->descripcion;
        $productoT->precio = $request->precio;
        $productoT->stock = $request->stock;
        $productoT->save();
        return redirect()->route('productoT.index')->with('datos','Producto Actualizado ...!');
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
        $productoT=Transporte_Producto::findOrFail($id);
        return view('transporte.producto.confirmar',compact('productoT'));
    }

    public function destroy($id)
    {
        //
        $productoT=Transporte_Producto::findOrFail($id);
        $productoT->estado='0';
        $productoT->save();
        return redirect()->route('productoT.index')->with('datos','Producto Eliminado ...!');
    }
}
