@extends('template/main')

@section('title')
  Lista de Patrimonios
@endsection

@section('content')

  <div class="panel-group" id="accordion" role="tablist" aria-multiselectable="true">
    <div class="panel panel-primary">
      <div class="panel-heading" role="tab" id="headingOne">
        <h4 class="panel-title">
          <a role="button" data-toggle="collapse" data-parent="#accordion" href="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
            Registrar un nuevo patrimonio
          </a>
        </h4>
      </div>
      <div id="collapseOne" class="panel-collapse collapse" role="tabpanel" aria-labelledby="headingOne">
        <div class="panel-body">

          <!--Aqui va el formulario de registro de un nuevo usuario-->
          <form class="row" action="{{route('solidario.patrimonios.store')}}" method="post">
            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
            <div class="box-body">

              <div class="form-group">
                <label for="nombreEmpresa">Organización</label>

                <select class="form-control" type="text" name="nombreEmpresa" style="width: 100%;">
                  <optgroup label="Fondos de Empleados">
                    @foreach($organizaciones as $organizacion)
                      @if($organizacion->razonSocial == 'Fondo de Empleados')
                        <option>{{$organizacion->nombre}}</option>
                      @endif
                    @endforeach
                  </optgroup>

                  <optgroup label="Cooperativas">
                    @foreach($organizaciones as $organizacion)
                      @if($organizacion->razonSocial == 'Cooperativa')
                        <option>{{$organizacion->nombre}}</option>
                      @endif
                    @endforeach
                  </optgroup>

                  <optgroup label="Mutuales">
                    @foreach($organizaciones as $organizacion)
                      @if($organizacion->razonSocial == 'Mutual')
                        <option>{{$organizacion->nombre}}</option>
                      @endif
                    @endforeach
                  </optgroup>
                </select>
              </div>

              <div class="form-group">
                <label for="anio">Año</label>
                <input type="number" class="form-control" name="anio" placeholder="Ingrese el año al que pertenece el valor del patrimonio" required>
              </div>
              <div class="form-group">
                <label for="valor">Valor</label>
                <input type="number" class="form-control" name="valor" placeholder="Ingrese el Valor/Cantidad de Dinero en Pesos Colombianos" required>
              </div>
            </div><!-- /.box-body -->
            <div class="box-footer">
              <button type="submit" class="btn btn-primary">Agregar</button>
            </div>

          </form>

        </div>
      </div>
    </div>
  </div>

  <hr>
  <table class="table table-hover table-condensed">
    <thead>
      <tr>
        <th>Id</th>
        <th>IdEmpresa</th>
        <th>Año</th>
        <th>Valor</th>
        <th>Editar</th>
        <th>Eliminar</th>
      </tr>
    </thead>
    <tbody>
      @foreach($patrimonios as $patrimonio)
        <tr>
          <td>{{$patrimonio->id}}</td>
          <td>{{$patrimonio->idEmpresa}}</td>
          <td>{{$patrimonio->anio}}</td>
          <td>{{$patrimonio->valor}}</td>
          <td><a href=" {{ route('solidario.patrimonios.edit',$patrimonio->id) }} " class="btn btn-success"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a></td>
          <td><a href=" {{ route('solidario.patrimonios.destroy',$patrimonio->id) }} " class="btn btn-danger"><i class="fa fa-trash" aria-hidden="true"></i></a></td>
        </tr>
      @endforeach
    </tbody>
  </table>

  {!! $patrimonios->render() !!}

@endsection
