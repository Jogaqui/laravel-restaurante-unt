<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Transporte_Producto;
use Illuminate\Http\Request;
use App\Models\Almacen_Insumo;
use App\Http\Controllers\Almacen_InsumoController;
class Almacen_ProductoController extends Controller
{
    const PAGINATION = 8;

    public function index(Request $request)
    {
        //
        $buscarPr=$request->get('buscarporD');
        $productoA=Transporte_Producto::where('estado','=','1')->where('descripcion','like','%'.$buscarPr.'%')->paginate($this::PAGINATION);
       
        return view('almacen.producto.index',compact('productoA','buscarPr'));
    }

    public function VistaReducirStock ( $id){
     
        $insumos= Almacen_Insumo::where('estado','=',1)->get();
        $productoA=Transporte_Producto::findOrFail($id);
        return view('almacen.producto.reducirInsumo',compact('insumos','productoA'));
       
    }

    public function reducirInsumo (Request $request, $id){
        $data=request()->validate([
        
            'stockIn' => 'required|min:0'
        ],
        [
           
            'stockIn.required' => 'Ingrese la cantidad a reducir',
            'stockIn.min' => 'Ingrese valor positivo',
        ]);
        $productoA=Transporte_Producto::findOrFail($id);
        $insumo = Almacen_Insumo::findOrFail($request->idInsumo);
       if ($insumo->stockIn >=$request->stockIn){
        
        $insumo->update(['stockIn' => $insumo->stockIn - $request->stockIn]);
        $insumo->save();
        return redirect()->route('productoA.index')->with('datos','Stock de insumos actualizados ...!');
       }else{
       
        return redirect()->route('productoA.index')->with('datos','Stock de insumo insuficiente ...!');
       }

   
       
    }

    public function create()
    {
      
        return view('almacen.producto.create');
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
        $productoA = new Transporte_Producto();
        $productoA->descripcion = $request->descripcion;
        $productoA->precio = $request->precio;
        $productoA->stock = $request->stock;
        $productoA->estado = '1';
        $productoA->save();
        return redirect()->route('productoA.index')->with('datos','Producto Nuevo Guardado ...!');
       
       // return redirect()->route ('productoA.reducirInsumo', compact('productoA'));
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
        $productoA=Transporte_Producto::findOrFail($id);
        return view('almacen.producto.edit',compact('productoA'));
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

        $productoA = Transporte_Producto::findOrFail($id);
        $productoA->descripcion = $request->descripcion;
        $productoA->precio = $request->precio;
        $productoA->stock = $request->stock;
        $productoA->save();
        return redirect()->route('productoA.index')->with('datos','Producto Actualizado ...!');
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
        $productoA=Transporte_Producto::findOrFail($id);
        return view('almacen.producto.confirmar',compact('productoA'));
    }

    public function destroy($id)
    {
        //
        $productoA=Transporte_Producto::findOrFail($id);
        $productoA->estado='0';
        $productoA->save();
        return redirect()->route('productoA.index')->with('datos','Producto Eliminado ...!');
    }
}
