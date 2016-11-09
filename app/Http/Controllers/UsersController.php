<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\User;

class UsersController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('name','ASC')->paginate(15);
        return view('admin.users.index')->with('users',$users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminatez\Http\Response
     */
    public function store(Request $request){
      if ($request->file('imagen')){
        $file=$request->file('imagen');
        $name= 'usuario_'.time(). ".".$file->getClientOriginalExtension();
        $path=public_path()."/template/dis/img/estudiantes/";
        $file->move($path,$name);

      $usuario = new User();
      $usuario->name=$request->name;
      $usuario->email=$request->email;
      $usuario->rol=$request->rol;
      $usuario->imagen=$name;
      $usuario->password=bcrypt($request->password);

      $usuario->save();

      return redirect()->route('solidario.users.index');
    }
  }

    public function edit($id)
    {
      $usuario = User::find($id);
      return view('admin/users/edit',['usuario'=>$usuario]);
    }

    public function update(Request $request, $id){
      $usuario = User::find($id);

      $usuarios = User::all();
      $flagCorreo = false;

      foreach ($usuarios as $user) {
        if($user->email == $request->email && $user->id != $id){
          $flagCorreo = true;
        }
      }

      if ($flagCorreo == true) {
        return redirect()->route('solidario.users.edit',$id);
      }
      if ($flagCorreo == false) {

        $usuario->name=$request->name;
        $usuario->email=$request->email;
        $usuario->password=bcrypt($request->password);

        $usuario->save();

        return redirect()->route('solidario.users.index');
    }
  }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id){
      $usuario = User::find($id);
      $usuario->delete();

      return redirect()->route('solidario.users.index');
    }
}
