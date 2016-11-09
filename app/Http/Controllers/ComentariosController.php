<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Organizacion;
use App\Comentario;

class ComentariosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $comentarios = Comentario::orderBy('id','ASC')->paginate(10);
        $organizaciones = Organizacion::all();
        return view('admin.comentarios.index')->with('comentarios',$comentarios)->with('organizaciones',$organizaciones);
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

        $comentario = new Comentario();
        $organizaciones = Organizacion::all();
        $id = 0;
        foreach ($organizaciones as $org) {
            if($org->nombre == $request->nombreEmpresa){
                $id = $org->id;
            }
        }

        $comentario->idEmpresa = $id;
        $comentario->descripcion = $request->descripcion;
        $comentario->save();

        return redirect()->route('solidario.comentarios.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $comentario = Comentario::find($id);
        $organizaciones = Organizacion::all();
        return view('admin/comentarios/edit',['comentario'=>$comentario],['organizaciones'=>$organizaciones]);
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
        $comentario = Comentario::find($id);
        $comentario->descripcion = $request->descripcion;
       
        $comentario->save();
        return redirect()->route('solidario.comentarios.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $comentario = Comentario::find($id);
        $comentario->delete();
        return redirect()->route('solidario.comentarios.index');
    }
}
