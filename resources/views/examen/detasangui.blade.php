@extends('admin.layouts.index')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-post" id="post_card">
            <div class="card-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    Editar examen:
                    <div class="pull-right">
                        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm float-right" data-toggle="tooltip" data-placement="left" title data-original-title="Regresar a lista de citas">Regresar</a>
                    </div>
                </div>
            </div>
            <x-errores class="mb-4" />
            <form method="POST" action="{{route('detasangui.update', ['examen'=> $examen->id, 'detaSangui'=> $detaSangui->id] )}}" enctype="multipart/form-data" class="mb-0 needs-validation" role="form">
                @method('PUT')
                @csrf()
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-4">
                            <input id="idPaciente" type="hidden" class="form-control" name="idPaciente" value="{{$idPaciente}}" placeholder="Identificador del paciente">

                            @error('fecha')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group has-feedback row">
                                <label for="fecha" class="col-12 control-label">Fecha del examen:</label>
                                <div class="col-12">
                                    <input id="fecha" type="date" class="form-control" name="fecha" value="{{old('fecha',$examen->fecha) }}" placeholder="Fecha del examen">
                                </div>
                            </div>
                            @error('numBoleta')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group has-feedback row">
                                <label for="numBoleta" class="col-12 control-label">Numero de boleta:</label>
                                <div class="col-12">
                                    <input id="numBoleta" type="text" class="form-control" name="numBoleta" value="{{old('numBoleta',$examen->numBoleta)}}" placeholder="Numero de boleta">
                                </div>
                            </div>

                            @error('edad')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group has-feedback row">
                                <label for="edad" class="col-12 control-label">Edad:</label>
                                <div class="col-12">
                                    <input id="edad" type="number" class="form-control" name="edad" value="{{old('edad',$examen->edad)}}" placeholder="Edad">
                                </div>
                            </div>


                            
                            @error('generoExamen')
                            <div class="text-danger">{{ $message }}</div>
                            @enderror
                            <div class="form-group has-feedback row">
                                <label for="generoExamen" class="col-12 control-label">Genero: </label>
                                <div class="col-12">
                                    <select id="generoExamen" class="form-control" name="generoExamen" value="{{old('generoExamen',$examen->generoExamen)}}" placeholder="Genero">
                                        <option value="Femenino">Femenino</option>
                                        <option value="Masculino">Masculino</option>
                                    </select>
                                </div>
                            </div>

                        
                            <div class="form-group has-feedback row">
                                <label for="tipoExamen" class="col-12 control-label">Tipo de examen: </label>
                                <div class="col-12">
                                    <select id="tipoExamen" class="form-control" name="tipoExamen" value="{{old('tipoExamen', $examen->tipoExamen)}}" placeholder="Tipo de examen">
                                        <option selected value="{{$examen->tipoExamen}}">{{$examen->tipoExamen}}</option>
                                        <option value="Sanguineo">Sanguineo</option>
                                        <option value="Hemograma">Hemograma</option>
                                        <option value="Heces">Heces</option>
                                        <option value="Orina">Orina</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <!--SANGUINEO-->
                            <div class="form-group has-feedback row sanguineo" style="display: none;">
                                <label for="glucosaSangui" class="col-12 control-label">Glucosa:</label>
                                <div class="col-12">
                                    <input id="glucosaSangui" type="number" step="any" class="form-control sanguineo" name="glucosaSangui" value="{{old('glucosaSangui', $detaSangui->glucosaSangui)}}" placeholder="Glucosa">
                                </div>
                            </div>

                            <div class="form-group has-feedback row sanguineo" style="display: none;">
                                <label for="colesterol" class="col-12 control-label">Colesterol:</label>
                                <div class="col-12">
                                    <input id="colesterol" type="number" step="any" class="form-control sanguineo" name="colesterol" value="{{old('colesterol', $detaSangui->colesterol)}}" placeholder="Colesterol">
                                </div>
                            </div>

                            <div class="form-group has-feedback row sanguineo" style="display: none;">
                                <label for="trigliceridos" class="col-12 control-label">Trigliceridos:</label>
                                <div class="col-12">
                                    <input id="trigliceridos" type="number" step="any" class="form-control sanguineo" name="trigliceridos" value="{{old('trigliceridos', $detaSangui->trigliceridos)}}" placeholder="Trigliceridos">
                                </div>
                            </div>
                        
                        </div>



                        <div class="col-sm-4">
                            <!--SANGUINEO-->
                            <div class="form-group has-feedback row sanguineo" style="display: none;">
                                <label for="nitrogenoUreico" class="col-12 control-label">Nitrogeno ureico:</label>
                                <div class="col-12">
                                    <input id="nitrogenoUreico" type="number" step="any" class="form-control sanguineo" name="nitrogenoUreico" value="{{old('nitrogenoUreico', $detaSangui->nitrogenoUreico)}}" placeholder="Nitrogeno ureico">
                                </div>
                            </div>


                            <div class="form-group has-feedback row sanguineo" style="display: none;">
                                <label for="creatinina" class="col-12 control-label">Creatinina:</label>
                                <div class="col-12">
                                    <input id="creatinina" type="number" step="any" class="form-control sanguineo" name="creatinina" value="{{old('creatinina',$detaSangui->creatinina )}}" placeholder="Creatinina">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group has-feedback row sanguineo" style="display: none;">
                                <label for="observacionesSangui" class="col-12 control-label">Observaciones:</label>
                                <div class="col-12">
                                    <textarea rows="5" cols="50" id="observacionesSangui" type="text" class="form-control sanguineo" name="observacionesSangui" value="{{old('observacionesSangui', $detaSangui->observacionesSangui)}}" placeholder="Observaciones">{{old('observacionesSangui', $detaSangui->observacionesSangui)}}</textarea>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="card-footer">
                    <div class="row">
                        <div class="col-md-6">
                            <span data-toggle="tooltip" title data-original-title="Guardar cambios realizados">
                                <button type="submit" class="btn btn-success btn-lg btn-block " value="Guardar" name="action">
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
                </div>
            </form>
        </div>
    </div>
    <!--<div class="col-sm-9">
        <div class="card card-post" id="post_card">
            <div class="card-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    Resultados de examen:
                    <div class="pull-right">
                        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm float-right" data-toggle="tooltip" data-placement="left" title data-original-title="Regresar a lista de citas">Regresar</a>
                    </div>
                </div>
            </div>
            <x-errores class="mb-4" />
            <form method="POST" action="/examen" enctype="multipart/form-data" class="mb-0 needs-validation" role="form">
                {{ csrf_field() }}
  
            </form>
            <div class="card-footer">
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
            </div>
        </div>
    </div>-->
</div>
@section('js_user_page')

<script>
    $(document).ready(function()  {
        $("#tipoExamen").change(function() {
            if ($("option:selected", this).text() == 'Sanguineo') {
                $(".sanguineo").show();
            } else {
                $(".sanguineo").hide();
            }
            if ($("option:selected", this).text() == 'Hemograma') {
                $(".hemograma").show();
            } else {
                $(".hemograma").hide();
            }
            if ($("option:selected", this).text() == 'Heces') {
                $(".heces").show();
            } else {
                $(".heces").hide();
            }
            if ($("option:selected", this).text() == 'Orina') {
                $(".orina").show();
            } else {
                $(".orina").hide();
            }
        });
        $('#tipoExamen').trigger('change');
    });
</script>

@endsection
@endsection