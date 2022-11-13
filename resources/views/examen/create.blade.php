@extends('admin.layouts.index')

@section('content')

<div class="row">
    <div class="col-sm-3">
        <div class="card card-post" id="post_card">
            <div class="card-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    Registrar examen:
                    <div class="pull-right">
                        <!--<a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm float-right" data-toggle="tooltip" data-placement="left" title data-original-title="Regresar a lista de citas">Regresar</a>-->
                    </div>
                </div>
            </div>
            <x-errores class="mb-4" />
            <form method="POST" action="/examen" enctype="multipart/form-data" class="mb-0 needs-validation" role="form">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            @error('fecha')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group has-feedback row">
                                <label for="fecha" class="col-12 control-label">Fecha del examen:</label>
                                <div class="col-12">
                                    <input id="fecha" type="date" class="form-control" name="fecha" value="{{old('fecha')}}" placeholder="Fecha del examen">
                                </div>
                            </div>
                            @error('numBoleta')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group has-feedback row">
                                <label for="numBoleta" class="col-12 control-label">Numero de boleta:</label>
                                <div class="col-12">
                                    <input id="numBoleta" type="text" class="form-control" name="numBoleta" value="{{old('numBoleta')}}" placeholder="Numero de boleta">
                                </div>
                            </div>

                            @error('edad')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group has-feedback row">
                                <label for="edad" class="col-12 control-label">Edad:</label>
                                <div class="col-12">
                                    <input id="edad" type="number" class="form-control" name="edad" value="{{old('edad')}}" placeholder="Edad">
                                </div>
                            </div>

                            @error('generoExamen')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group has-feedback row">
                                <label for="generoExamen" class="col-12 control-label">Genero: </label>
                                <div class="col-12">
                                    <select id="generoExamen" class="form-control" name="generoExamen" value="{{old('generoExamen')}}" placeholder="Genero">
                                        <option value="Femenino">Femenino</option>
                                        <option value="Masculino">Masculino</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group has-feedback row">
                                <label for="tipoExamen" class="col-12 control-label">Tipo de examen: </label>
                                <div class="col-12">
                                    <select id="tipoExamen" class="form-control" name="tipoExamen" value="" placeholder="Tipo de examen">
                                        <option value="sanguineo">Sanguineo</option>
                                        <option value="hemoglobina">Hemoglobina</option>
                                        <option value="heces">Heces</option>
                                        <option value="orina">Orina</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <span data-toggle="tooltip" title data-original-title="Guardar cambios realizados">
                                <button type="submit" class="btn btn-success btn-lg btn-block" value="Guardar" name="action">
                                    <i class="fa fa-save fa-fw">
                                        <span class="sr-only">
                                            Guardar Icono
                                        </span>
                                    </i>
                                    Guardar
                                </button>
                            </span>
                        </div>
                    </div>
                </div>-->
            </form>
        </div>
    </div>
    <div class="col-sm-9">
    <div class="card card-post" id="post_card">
            <div class="card-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    Resultados de examen:
                    <div class="pull-right">
                        <!--<a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm float-right" data-toggle="tooltip" data-placement="left" title data-original-title="Regresar a lista de citas">Regresar</a>-->
                    </div>
                </div>
            </div>
            <x-errores class="mb-4" />
            <form method="POST" action="/examen" enctype="multipart/form-data" class="mb-0 needs-validation" role="form">
                {{ csrf_field() }}
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-6">
                            @error('glucosaSangui')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group has-feedback row">
                                <label for="glucosaSangui" class="col-12 control-label">Glucosa:</label>
                                <div class="col-12">
                                    <input id="glucosaSangui" type="number" step="any" class="form-control" name="glucosaSangui" value="{{old('glucosaSangui')}}" placeholder="Glucosa">
                                </div>
                            </div>
                            @error('colesterol')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group has-feedback row">
                                <label for="colesterol" class="col-12 control-label">Colesterol:</label>
                                <div class="col-12">
                                    <input id="colesterol" type="number" step="any" class="form-control" name="colesterol" value="{{old('colesterol')}}" placeholder="Colesterol">
                                </div>
                            </div>

                            @error('trigliceridos')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group has-feedback row">
                                <label for="trigliceridos" class="col-12 control-label">Trigliceridos:</label>
                                <div class="col-12">
                                    <input id="trigliceridos" type="number" step="any" class="form-control" name="trigliceridos" value="{{old('trigliceridos')}}" placeholder="Trigliceridos">
                                </div>
                            </div>

                            @error('nitrogenoUreico')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group has-feedback row">
                                <label for="nitrogenoUreico" class="col-12 control-label">Nitrogeno ureico:</label>
                                <div class="col-12">
                                    <input id="nitrogenoUreico" type="number" step="any" class="form-control" name="nitrogenoUreico" value="{{old('nitrogenoUreico')}}" placeholder="Nitrogeno ureico">
                                </div>
                            </div>

                            @error('creatinina')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group has-feedback row">
                                <label for="creatinina" class="col-12 control-label">Creatinina:</label>
                                <div class="col-12">
                                    <input id="creatinina" type="number" step="any" class="form-control" name="creatinina" value="{{old('creatinina')}}" placeholder="Creatinina">
                                </div>
                            </div>

                            @error('observacionesSangui')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group has-feedback row">
                                <label for="observacionesSangui" class="col-12 control-label">Observaciones:</label>
                                <div class="col-12">
                                    <input id="observacionesSangui" type="text" class="form-control" name="observacionesSangui" value="{{old('observacionesSangui')}}" placeholder="Observaciones">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--<div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <span data-toggle="tooltip" title data-original-title="Guardar cambios realizados">
                                <button type="submit" class="btn btn-success btn-lg btn-block" value="Guardar" name="action">
                                    <i class="fa fa-save fa-fw">
                                        <span class="sr-only">
                                            Guardar Icono
                                        </span>
                                    </i>
                                    Guardar
                                </button>
                            </span>
                        </div>
                    </div>
                </div>-->
            </form>
        </div>
    </div>
</div>
@endsection