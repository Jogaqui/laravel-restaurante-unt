<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Cupon;
use Illuminate\Http\Request;

class MarketingController extends Controller
{
    public function index(Request $request)
    {
        $buscarPr = $request->get('buscarporD');
        $cupones = Cupon::paginate(5);
        return view('marketing.index', compact('cupones', 'buscarPr'));
    }

    public function create()
    {
        return view('marketing.create');
    }

    public function store(Request $request)
    {
        Cupon::create($request->all());
        return redirect()->route('marketing.index')->with('datos', 'Registro Nuevo Guardado ...!');
    }

    public function show($id)
    {
        $cupon = Cupon::findOrFail($id);
        return view('marketing.show', compact('cupon'));
    }

    public function edit($id)
    {
        $cupon = Cupon::findOrFail($id);
        return view('marketing.edit', compact('cupon'));
    }

    public function update(Request $request, $id)
    {
        Cupon::findOrFail($id)->update($request->all());
        return redirect()->route('marketing.index')->with('datos', 'Registro Actualizado ...!');
    }

    public function destroy($id)
    {
        Cupon::findOrFail($id)->delete();
        return redirect()->route('marketing.index')->with('datos', 'Registro Eliminado ...!');
    }
}
