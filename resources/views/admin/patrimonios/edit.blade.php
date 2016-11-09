@extends('template/main')

@section('title')
  Editar datos del patrimonio{{$patrimonio->anio}}
@endsection

@section('content')

  {!! Form::open(['route'=>['solidario.patrimonios.update',$patrimonio],'method'=>'PUT','class'=>'form-horizontal']) !!}
  <div class="box-body">
    <div class="form-group">
      <label for="anio">Año</label>
      <input type="number" class="form-control" name="anio" value="{{$patrimonio->anio}}" required>
    </div>

    <div class="form-group">
      <label for="valor">Valor</label>
      <input type="number" class="form-control" name="valor" value="{{$patrimonio->valor}}" required>
    </div>
  </div><!-- /.box-body -->
  <div class="box-footer">
    <button type="submit" name="editar" class="btn btn-primary">Registrar Cambios</button>
  </div>
  {!! Form::close() !!}

@endsection
