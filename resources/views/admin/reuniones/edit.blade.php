@extends('template/main')

@section('title')
  Editar datos de la reunión{{$reunion->id}}
@endsection

@section('content')

  {!! Form::open(['route'=>['solidario.reuniones.update',$reunion],'method'=>'PUT','class'=>'form-horizontal']) !!}
  <div class="box-body">
    <div class="form-group">
      <label for="descripcion">Descripción</label>
      <textarea row="5" cols="50" class="form-control" name="descripcion" value="{{$reunion->descripcion}}" required>
      </textarea>
    </div>

    <div class="form-group">
      <label for="cantidadAsistentes">Numero de asistentes a la reunión</label>
      <input type="number" class="form-control" name="cantidadAsistentes" value="{{$reunion->cantidadAsistentes}}" required>
    </div>
    <div class="form-group">
      <label for="cantidadDecisiones">Cantidad llamados atencion</label>
      <input type="number" class="form-control" name="cantidadDecisiones" value="{{$reunion->cantidadDecisiones}}" required>
    </div>
  </div><!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" name="editar" class="btn btn-primary">Registrar Cambios</button>
  </div>
  {!! Form::close() !!}

@endsection
