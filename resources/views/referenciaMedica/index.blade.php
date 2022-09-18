@extends('admin.layouts.index')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12"></div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-10"> 
            <div class="card card-post" id="post_card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        Referencia medica pacientes 
                        <div class="pull-right">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm float-right" data-toggle="tooltip" data-placement="left" title data-original-title="Regresar a lista de categorias">Regresar</a>
                        </div>
                    </div>
                </div>
                <x-errores class="mb-4" />
                <form action="{{route('referenciaMedica.store')}}" method="post" target="blank">
                @csrf
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-feedback row">
                                    <label for="nombre" class="col-12 control-label">Nombre de medico:</label>
                                    <div class="col-12">
                                      <input id="nombre" type="text" class="form-control" name="nombreMedico" value="{{old('nombre')}}" placeholder="Nombre de medico" >
                                    </div>
                                </div>

                                <div class="form-group has-feedback row">
                                    <label for="nombre" class="col-12 control-label">Nombre del paciente:</label>
                                    <div class="col-12">
                                      <input id="nombre" type="text" class="form-control" name="nombrePaciente" value="{{old('nombre')}}" placeholder="Nombre del paciente" >
                                    </div>
                                </div>

                                <div class="form-group has-feedback row">
                                  <label for="nombre" class="col-12 control-label">Fecha de emisión</label>

                                        <div class="col-sm-6">
                                            <input  class="form-control float-md-right"  id="start" name="fecha" value="" min="2022-01-01">
                                        </div>
                                        <script>
                                            document.getElementById("start").innerHTML = Date();
                                        </script>
                                              
                                </div>

  <div class="form-group has-feedback row">
                                    <label for="descripcion" class="col-12 control-label">Descripcion de la referencia:</label>
                                    <div class="col-12">
                                      <textarea name="descripcion" class="form-control" value="{{old('descripcion')}}" id="descripcion" rows="3">{{old('descripcion')}}</textarea>
                                    </div>
                                </div>
                            </div>
                          </div>
                 </div>
                 <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <span data-toggle="tooltip" title data-original-title="Guardar cambios realizados">
                                <button type="submit" class="btn btn-success btn-lg btn-block" value="Guardar" name="action">
                                    <i class="fa fa-save fa-fw">
                                        <span class="sr-only">
                                            Guardar categoria Icono
                                        </span>
                                    </i>
                                    Guardar referencia
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                  </form>
                  </div>
        </div>
    </div>
</div>   
<div>
@endsection