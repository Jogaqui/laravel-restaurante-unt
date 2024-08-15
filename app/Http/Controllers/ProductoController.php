<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Unidad;
use App\Models\Producto;
use Illuminate\Http\Request;


class ProductoController extends Controller
{
    const PAGINATION = 8;

    public function index(Request $request)
    {
        //
        $buscar=$request->get('buscarpor');
        $producto=Producto::where('estado','=','1')->where('descripcion','like','%'.$buscar.'%')->paginate($this::PAGINATION);
       
        return view('ventas.producto.index',compact('producto','buscar'));
    }

    

    public function create()
    {
        //
        return view('ventas.producto.create');
    }

    public function store(Request $request)
    {
        //
        $data=request()->validate([
            'descripcion' => 'required|max:40',
            'precio' => 'required|min:0',
        ],
        [
            'descripcion.required' => 'Ingrese descripción de Categoría',
            'descripcion.max' => 'Máximo 40 caracteres para la descripción',
            'precio.required' => 'Ingrese precio de Producto',
            'precio.min' => 'Ingrese precio positivo',
        ]);
        $producto = new Producto();
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->estado = '1';
        $producto->save();
        return redirect()->route('producto.index')->with('datos','Producto Nuevo Guardado ...!');

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
        $producto=Producto::findOrFail($id);
        return view('ventas.producto.edit',compact('producto'));
    }

    public function update(Request $request, $id)
    {
        //
        $data=request()->validate([
            'descripcion' => 'required|max:40',
            'precio' => 'required|min:0',
        ],
        [
            'descripcion.required' => 'Ingrese descripción de Categoría',
            'descripcion.max' => 'Máximo 40 caracteres para la descripción',
            'precio.required' => 'Ingrese precio de Producto',
            'precio.min' => 'Ingrese precio positivo',
        ]);

        $producto = Producto::findOrFail($id);
        $producto->descripcion = $request->descripcion;
        $producto->precio = $request->precio;
        $producto->save();
        return redirect()->route('producto.index')->with('datos','Producto Actualizado ...!');
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
        $producto=Producto::findOrFail($id);
        return view('ventas.producto.confirmar',compact('producto'));
    }

    public function destroy($id)
    {
        //
        $producto=Producto::findOrFail($id);
        $producto->estado='0';
        $producto->save();
        return redirect()->route('producto.index')->with('datos','Producto Eliminado ...!');
    }
}
