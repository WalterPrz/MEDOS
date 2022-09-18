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

                                    <select id="hora_cita" type="text" class="form-control" name="hora_cita" value="{{old('hora_cita', $cita->hora_cita)}}" placeholder="Hora de la cita">
                                        <option value="8:00">8:00 - 8:30</option>
                                        <option value="8:30">8:30 - 9:00</option>
                                        <option value="9:00">9:00 - 9:30</option>
                                        <option value="9:30">9:30 - 10:00</option>
                                        <option value="10:00">10:00 - 10:30</option>
                                        <option value="10:30">10:30 - 11:00</option>
                                        <option value="11:00">11:00 - 11:30</option>
                                        <option value="14:00">14:00 - 14:30</option>
                                        <option value="14:30">14:30 - 15:00</option>
                                        <option value="15:00">15:00 - 15:30</option>
                                        <option value="15:30">15:30 - 16:00</option>
                                        <option value="16:00">16:00 - 16:30</option>
                                        <option value="16:30">16:30 - 17:00</option>
                                        <option value="17:00">17:00 - 17:30</option>
                                    </select>

                                    </div>
                                </div>
                           
                                
                                <div class="form-group has-feedback row">
                                    <label for="descripcion" class="col-12 control-label">Descripcion</label>
                                    <div class="col-12">
                                    <input id="descripcion" type="text" class="form-control" name="descripcion" value="{{old('descripcion', $cita->descripcion)}}" placeholder="Detalles de la cita">
                                    </div>
                                </div>
                                
                                <input id="estado" type="hidden" class="form-control" name="estado" value="{{old('estado', $cita->estado)}}" placeholder="Estado">
                                
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
