<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Notificacion_Insumo;
use App\Models\Almacen_Insumo;
class Notificacion_InsController extends Controller
{
    const PAGINATION = 10;

    public function index(Request $request)
    {
        //
        $buscarIn=$request->get('buscarIn');
     
        $notif=Notificacion_Insumo::where('estado','=','1')->where('mensaje','like','%'.$buscarIn.'%')->paginate($this::PAGINATION);
        
        return view('almacen.notificacion.index',compact('notif','buscarIn'));
    }

    public function listaN(Request $request)
    {
        //
        $buscarIn=$request->get('buscarIn');
     
        $notif=Notificacion_Insumo::where('estado','=','1')->where('mensaje','like','%'.$buscarIn.'%')->paginate($this::PAGINATION);
        
        return view('compras.notifLista',compact('notif','buscarIn'));
    }

    

    public function create()
    {
        //
        $insumos= Almacen_Insumo::where('estado','=',1)->get();
        return view('almacen.notificacion.create', compact('insumos'));
    }

    public function store(Request $request)
    {
        //
        $data=request()->validate([
           
            'mensaje' =>  'required|max:250',
          
            'fecha_creacion' => 'required|max:30',
            'hora_creacion' => 'required|max:30'
   
        
        ],
        [
            'mensaje.required' => 'Ingrese el mensaje',
            'mensaje.max' => 'Máximo 50 caracteres para la descripción',
            'fecha_creacion.required' => 'Ingrese fecha',
            'fecha_creacion.max' => 'Ingrese solo la fecha',
            'hora_creacion.required' => 'Ingrese hora',
            'hora_creacion.max' => 'Ingrese solo la hora',
        ]);
        $notif = new Notificacion_Insumo();
        $notif->insumo_Id = $request->idInsumo;
        $insumoAlm=Almacen_Insumo::findOrFail($request->idInsumo);
        $notif->mensaje = "Stock actual: " . $insumoAlm->stockIn . ". " . $request->mensaje;

        $notif->fecha_creacion = $request->fecha_creacion;
        $notif->hora_creacion = $request->hora_creacion;
   
        $notif->estado = '1';
        $notif->save();
        return redirect()->route('notifA.index')->with('datos','Notificación generada ...!');

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
        $notifA=Notificacion_Insumo::findOrFail($id);
        $insumo= Almacen_Insumo::where('estado','=',1)->get();
        return view('almacen.notificacion.edit',compact('notifA','insumo'));
    }

    public function update(Request $request, $id)
    {
        //
        $data=request()->validate([
           
            'mensaje' =>  'required|max:250',
          
            'fecha_creacion' => 'required|max:30',
            'hora_creacion' => 'required|max:30'
   
        
        ],
        [
            'mensaje.required' => 'Ingrese el mensaje',
            'mensaje.max' => 'Máximo 50 caracteres para la descripción',
            'fecha_creacion.required' => 'Ingrese fecha',
            'fecha_creacion.max' => 'Ingrese solo la fecha',
            'hora_creacion.required' => 'Ingrese hora',
            'hora_creacion.max' => 'Ingrese solo la hora',
        ]);

        $notifA = Notificacion_Insumo::findOrFail($id);
        $notifA->insumo_Id = $request->idInsumo;
        $insumoAlm=Almacen_Insumo::findOrFail($request->idInsumo);
        $notifA->mensaje = "Stock actual: " . $insumoAlm->stockIn . ". " . $request->mensaje;

        $notifA->fecha_creacion = $request->fecha_creacion;
        $notifA->hora_creacion = $request->hora_creacion;
   
     
        $notifA->save();
        return redirect()->route('insumoA.index')->with('datos','Notificacion Actualizada ...!');
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
        $notifA=Notificacion_Insumo::findOrFail($id);
        return view('almacen.notificacion.confirmar',compact('notifA'));
    }

    public function confirmar2($id)
    {
        //confirmar eliminación (destroy)
        $notifA=Notificacion_Insumo::findOrFail($id);
        return view('compras.notifConfirmar',compact('notifA'));
    }

    public function destroy($id)
    {
        //
        $notifA=Notificacion_Insumo::findOrFail($id);
        $notifA->estado='0';
        $notifA->save();
        return redirect()->route('notifA.index')->with('datos','Notificación eliminada ...!');
    }

    public function destroy2($id)
    {
        //
        $notifA=Notificacion_Insumo::findOrFail($id);
        $notifA->estado='0';
        $notifA->save();
        return redirect()->route('compras.notificaciones.lista')->with('datos','Notificación eliminada ...!');
    }
}
