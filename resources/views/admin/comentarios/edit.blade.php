@extends('template/main')

@section('title')
  Editar Comentario{{$comentario->id}}
@endsection

@section('content')

  {!! Form::open(['route'=>['solidario.comentarios.update',$comentario],'method'=>'PUT','class'=>'form-horizontal']) !!}

  <div class="box-body">

    <div class="form-group">
      <label for="descripcion">Descripcion</label>
      <input type="textarea" rows="4" cols="50" class="form-control" name="descripcion" value="{{$comentario->descripcion}}" required>
    </div>

  </div><!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" name="editar" class="btn btn-primary">Registrar Cambios</button>
  </div>
  {!! Form::close() !!}

@endsection