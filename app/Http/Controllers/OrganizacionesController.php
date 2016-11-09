<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Organizacion;

class OrganizacionesController extends Controller
{
  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function index()
  {
      $organizaciones = Organizacion::orderBy('nombre')->paginate(10);
      return view('admin.organizaciones.index')->with('organizaciones',$organizaciones);
  }

  public function store(Request $request){
    $organizacion = new Organizacion();
    $organizacion->nombre=$request->nombre;
    $organizacion->telefono=$request->telefono;
    $organizacion->direccion=$request->direccion;
    $organizacion->razonSocial=$request->razonSocial;

    $organizacion->save();

    return redirect()->route('solidario.orgs.index');
  }

  public function edit($id)
  {
    $organizacion = Organizacion::find($id);
    return view('admin/organizaciones/edit',['organizacion'=>$organizacion]);
  }

  public function update(Request $request, $id){
    $organizacion = Organizacion::find($id);

    $organizaciones = Organizacion::all();
    $flagNombre = false;

    foreach ($organizaciones as $org) {
      if($org->nombre == $request->nombre && $org->id != $id){
        $flagNombre = true;
      }
    }

    if ($flagNombre == true) {
      return redirect()->route('solidario.orgs.edit',$id);
    }
    if ($flagNombre == false) {

      $organizacion->nombre=$request->nombre;
      $organizacion->telefono=$request->telefono;
      $organizacion->direccion=$request->direccion;
      $organizacion->razonSocial=$request->razonSocial;

      $organizacion->save();

      return redirect()->route('solidario.orgs.index');
  }
}

      public function destroy($id){
      $organizacion = Organizacion::find($id);
      $organizacion->delete();

      return redirect()->route('solidario.orgs.index');
      }

}
