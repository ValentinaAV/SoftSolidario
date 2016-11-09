@extends('template/main')

@section('title')
  Editar datos de usuario {{$usuario->name}}
@endsection

@section('content')

  {!! Form::open(['route'=>['solidario.users.update',$usuario],'method'=>'PUT','class'=>'form-horizontal']) !!}
    <div class="form-group">
      <label class="control-label col-sm-2 col-sm-offset-3 col-md-2 col-md-offset-3" for="name">Nombre:</label>
      <div class="col-sm-3 col-md-3">
        <input class="form-control" type="text" name="name" value="{{$usuario->name}}" required>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2 col-sm-offset-3 col-md-2 col-md-offset-3" for="telefono">Correo:</label>
      <div class="col-sm-3 col-md-3">
        <input class="form-control" type="email" name="email" value="{{$usuario->email}}" required>
      </div>
    </div>

    <div class="form-group">
      <label class="control-label col-sm-2 col-sm-offset-3 col-md-2 col-md-offset-3" for="direccion">Contraseña:</label>
      <div class="col-sm-3 col-md-3">
        <input class="form-control" type="password" name="password" value="">
      </div>
    </div>

    <div class="form-group">
      <div class="col-sm-2 col-sm-offset-5 col-md-2 col-md-offset-5">
        <button class="btn btn-primary" type="submit" name="editar">Registrar cambios</button>
      </div>
    </div>
  {!! Form::close() !!}

@endsection
