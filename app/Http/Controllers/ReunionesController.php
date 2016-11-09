<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Reunion;
use App\Organizacion;

class ReunionesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $reuniones = Reunion::orderBy('cantidadAsistentes','ASC')->paginate(10);
        $organizaciones = Organizacion::all();
        return view('admin.reuniones.index')->with('reuniones',$reuniones)->with('organizaciones',$organizaciones);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $reunion = new Reunion();
        $organizaciones = Organizacion::all();
        $id = 0;
        foreach ($organizaciones as $org) {
            if($org->nombre == $request->nombreEmpresa){
                $id = $org->id;
            }
        }

        $reunion->idEmpresa = $id;
        $reunion->descripcion = $request->descripcion;
        $reunion->cantidadAsistentes = $request->cantidadAsistentes;
        $reunion->cantidadDecisiones = $request->cantidadDecisiones;
        $reunion->save();

        return redirect()->route('solidario.reuniones.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $reunion = Reunion::find($id);
        $organizaciones = Organizacion::all();
        return view('admin/reuniones/edit',['reunion'=>$reunion],['organizaciones'=>$organizaciones]);
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
        $reunion = Reunion::find($id);
        $reunion->descripcion = $request->descripcion;
        $reunion->cantidadAsistentes = $request->cantidadAsistentes;
        $reunion->cantidadDecisiones = $request->cantidadDecisiones;

        $reunion->save();
        return redirect()->route('solidario.reuniones.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $reunion = Reunion::find($id);
        $reunion->delete();
        return redirect()->route('solidario.reuniones.index');
    }
}
