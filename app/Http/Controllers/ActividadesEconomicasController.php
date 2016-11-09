<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Patrimonio;
use App\ActividadEconomica;

class ActividadesEconomicasController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $actividadesEconomicas = ActividadEconomica::orderBy('anio','ASC')->paginate(10);
        $patrimonios = Patrimonio::all();
        return view('admin.actividadesEconomicas.index')->with('actividadesEconomicas',$actividadesEconomicas)->with('patrimonios',$patrimonios);
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

        $actividadEconomica = new ActividadEconomica();
        $patrimonios = Patrimonio::all();
        $id = 0;
        foreach ($patrimonios as $pat) {
            if($pat->idEmpresa == $request->idEmpresa){
                $id = $pat->idEmpresa;
            }
        }

        $actividadEconomica->idPatrimonio= $id;
        $actividadEconomica->descripcion = $request->descripcion;
        $actividadEconomica->valor = $request->valor;
        $actividadEconomica->tipo = $request->tipo;
        $actividadEconomica->anio = $request->anio;
        $actividadEconomica->save();

        return redirect()->route('solidario.actividadesEconomicas.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $actividadEconomica = ActividadEconomica::find($id);
        $patrimonios = Patrimonio::all();
        return view('admin/actividadesEconomicas/edit',['actividadEconomica'=>$comentario],['patrimonios'=>$patrimonios]);
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
        $actividadEconomica = ActividadEconomica::find($id);
        $actividadEconomica->descripcion = $request->descripcion;
        $actividadEconomica->valor = $request->valor;
       
       
        $actividadEconomica->save();
        return redirect()->route('solidario.actividadesEconomicas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $actividadEconomica = ActividadEconomica::find($id);
        $actividadEconomica->delete();
        return redirect()->route('solidario.actividadesEconomicas.index');
    }
}
