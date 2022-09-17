@extends('admin.layouts.index')
@section('title','Citas')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12"></div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card card-post" id="post_card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        Editando cita: 
                        <div class="pull-right">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm float-right" data-toggle="tooltip" data-placement="left" title data-original-title="Regresar a lista de citas">Regresar</a>
                        </div>
                    </div>
                </div>

                <x-errores class="mb-4" />
                <form method="POST" action="/citas/{{ $cita->id }}" enctype="multipart/form-data" class="mb-0 needs-validation" role="form">
                    @method('PATCH')
                    @csrf()
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                            @error('especialidad')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group has-feedback row">
                                    <label for="especialidad" class="col-12 control-label">Especialidad:</label>
                                    <div class="col-12">
                                    <input id="especialidad" type="text" class="form-control" name="especialidad" value="{{old('especialidad',$cita->especialidad)  }}" placeholder="Especialidad" >
                                    </div>
                                </div>
                              
                                @error('paciente')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group has-feedback row">
                                    <label for="paciente" class="col-12 control-label">Paciente:</label>
                                    <div class="col-12">
                                    <input id="paciente" type="text" class="form-control" name="paciente" value="{{old('paciente', $cita->paciente)}}" placeholder="Paciente">
                                    </div>
                                </div>
                              

                                @error('fecha_cita')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group has-feedback row">
                                    <label for="fecha_cita" class="col-12 control-label">Fecha de la cita:</label>
                                    <div class="col-12">
                                    <input id="fecha_cita" type="date" class="form-control" name="fecha_cita" value="{{old('fecha_cita', $cita->fecha_cita)}}" placeholder="Fecha de la cita">
                                    </div>
                                </div>
                            
                                
                                @error('hora_cita')
                                    <div class="text-danger">{{ $message }}</div>
                                @enderror
                                <div class="form-group has-feedback row">
                                    <label for="hora_cita" class="col-12 control-label">Hora de la cita:</label>
                                    <div class="col-12">
                                    <input id="hora_cita" type="text" class="form-control" name="hora_cita" value="{{old('hora_cita', $cita->hora_cita)}}" placeholder="Hora de la cita">
                                    </div>
                                </div>
                           
                                
                                <div class="form-group has-feedback row">
                                    <label for="descripcion" class="col-12 control-label">Descripcion</label>
                                    <div class="col-12">
                                    <input id="descripcion" type="text" class="form-control" name="descripcion" value="{{old('descripcion', $cita->descripcion)}}" placeholder="Detalles de la cita">
                                    </div>
                                </div>
                                
                                
                            </div>
                          </div>
                 </div>
                 <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <span data-toggle="tooltip" title data-original-title="Guardar cambios realizados">
                                <button type="submit" class="btn btn-success btn-lg btn-block" value="Editar" name="action">
                                    <i class="fa fa-save fa-fw">
                                        <span class="sr-only">
                                            Guardar cita Icono
                                        </span>
                                    </i>
                                    Editar cita
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
@endsection
