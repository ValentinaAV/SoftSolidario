<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Dictamen;
use App\Organizacion;

class DictamenesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $dictamenes = Dictamen::orderBy('id','ASC')->paginate(10);
        $organizaciones = Organizacion::all();
        return view('admin.dictamenes.index')->with('dictamenes',$dictamenes)->with('organizaciones',$organizaciones);
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

        $dictamen = new Dictamen();
        $organizaciones = Organizacion::all();
        $id = 0;
        foreach ($organizaciones as $org) {
            if($org->nombre == $request->nombreEmpresa){
                $id = $org->id;
            }
        }

        $dictamen->idEmpresa = $id;
        $dictamen->nombreAuditor = $request->nombreAuditor;
        $dictamen->numTarjetaProfesional = $request->numTarjetaProfesional;
        $dictamen->cantLLamadosAtencion = $request->cantLLamadosAtencion;
        $dictamen->save();

        return redirect()->route('solidario.dictamenes.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $dictamen = Dictamen::find($id);
        $organizaciones = Organizacion::all();
        return view('admin/dictamenes/edit',['dictamen'=>$dictamen],['organizaciones'=>$organizaciones]);
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
        $dictamen = Dictamen::find($id);
        $dictamen->nombreAuditor = $request->nombreAuditor;
        $dictamen->numTarjetaProfesional = $request->numTarjetaProfesional;
        $dictamen->cantLLamadosAtencion = $request->cantLLamadosAtencion;

        $dictamen->save();
        return redirect()->route('solidario.dictamenes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $dictamen = Dictamen::find($id);
        $dictamen->delete();
        return redirect()->route('solidario.dictamenes.index');
    }
}
