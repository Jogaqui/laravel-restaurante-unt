<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    
    const PAGINATION=10;

    public function index(Request $request)
    {
        $buscarpor=$request->get('buscarpor');

        $categoria=Categoria::where('estado','=','1')->where('descripcion','like','%'.$buscarpor.'%')->paginate($this::PAGINATION);
       
        return view('ventas.categoria.index',compact('categoria','buscarpor'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('ventas.categoria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $data=request()->validate([
            'descripcion' => 'required|max:30'
        ],
        [
            'descripcion.required' => 'Ingrese descripción de Categoría',
            'descripcion.max' => 'Máximo 30 caracteres para la descripción',
        ]);
        $categoria = new Categoria();
        $categoria->descripcion = $request->descripcion;
        $categoria->estado = '1';
        $categoria->save();
        return redirect()->route('categoria.index')->with('datos','Registro Nuevo Guardado ...!');

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
        $categoria=Categoria::findOrFail($id);
        return view('ventas.categoria.edit',compact('categoria'));
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
        //
        $data=request()->validate([
            'descripcion' => 'required|max:30'
        ],
        [
            'descripcion.required' => 'Ingrese descripción de Categoría',
            'descripcion.max' => 'Máximo 30 caracteres para la descripción',
        ]);
        $categoria=Categoria::findOrFail($id);
        $categoria->descripcion=$request->descripcion;
        $categoria->save();
        return redirect()->route('categoria.index')->with('datos','Registro Actualizado ...!');

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
        $categoria=Categoria::findOrFail($id);
        return view('ventas.categoria.confirmar',compact('categoria'));
    }

    public function destroy($id)
    {
        //
        $categoria=Categoria::findOrFail($id);
        $categoria->estado='0';
        $categoria->save();
        return redirect()->route('categoria.index')->with('datos','Registro Eliminado ...!');
    }


}
