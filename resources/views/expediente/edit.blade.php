@extends('admin.layouts.index')
@section('title','Expedientes')
@section('content')

<div class="container">
    <div class="row py-lg-2">
        <div class="col-md-6">
        <h2>Editar expediente</h2>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card card-post" id="post_card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        Actualizando expediente: 
                        <div class="pull-right">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm float-right" data-toggle="tooltip" data-placement="left" title data-original-title="Regresar a lista de expedientes">Regresar</a>
                        </div>
                    </div>
                </div>
                <x-errores class="mb-4" />
                <form action="{{route('expediente.update', $expediente)}}" method="POST">
                @csrf
                @method('put')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group has-feedback row">
                                    <label for="nombrePaciente" class="col-12 control-label">Nombre del paciente:</label>
                                    <div class="col-12">
                                        <input id="nombrePaciente" class="form-control" name="nombrePaciente" value="{{old('nombrePaciente', $expediente->nombrePaciente)}}" >
                                    </div>
                                </div>
                                <div class="form-group has-feedback row">
                                    <label for="edadPaciente" class="col-12 control-label">Edad del paciente:</label>
                                    <div class="col-12">
                                        <input name="edadPaciente" class="form-control" type="number" min="1" max="200" step="1" value="{{old('edadPaciente', $expediente->edadPaciente)}}" id="edadPaciente"></input>
                                    </div>
                                </div>
                                <div class="form-group has-feedback row">
                                    <label for="genero" class="col-12 control-label">Genero del paciente:</label>
                                    <div class="col-12">
                                        <select name="genero" id="genero" class="form-control" value="{{old('genero', $expediente->genero)}}">
                                            <option value="masculino">Masculino</option>
                                            <option value="femenino">Femenino</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group has-feedback row">
                                    <label for="telefonoPaciente" class="col-12 control-label">Telefono del paciente:</label>
                                    <div class="col-12">
                                        <input name="telefonoPaciente" class="form-control" value="{{old('telefonoPaciente', $expediente->telefonoPaciente)}}" id="telefonoPaciente"></input>
                                    </div>
                                </div>
                                <div class="form-group has-feedback row">
                                    <label for="alergias" class="col-12 control-label">Alergias:</label>
                                    <div class="col-12">
                                        <textarea name="alergias" class="form-control" id="alergias" rows="5">{{old('alergias', $expediente->alergias)}}</textarea>
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
                                            Guardar expediente Icono
                                        </span>
                                    </i>
                                    Guardar expediente
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

