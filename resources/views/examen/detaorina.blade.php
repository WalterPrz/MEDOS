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
            <form method="POST" action="{{route('detaorina.update', ['examen'=> $examen->id, 'detaOrina'=> $detaOrina->id] )}}" enctype="multipart/form-data" class="mb-0 needs-validation" role="form">
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
                            <!--ORINA-->
                            <div class="form-group has-feedback row orina" style="display: none;">
                                <label for="colorOrina" class="col-12 control-label">Color:</label>
                                <div class="col-12">
                                    <input id="colorOrina" type="text" class="form-control orina" name="colorOrina" value="{{old('colorOrina', $detaOrina->colorOrina)}}" placeholder="Color">
                                </div>
                            </div>

                            <div class="form-group has-feedback row orina" style="display: none;">
                                <label for="aspecto" class="col-12 control-label">Aspecto:</label>
                                <div class="col-12">
                                    <input id="aspecto" type="text" class="form-control orina" name="aspecto" value="{{old('aspecto', $detaOrina->aspecto)}}" placeholder="Aspecto">
                                </div>
                            </div>

                            <div class="form-group has-feedback row orina" style="display: none;">
                                <label for="densidad" class="col-12 control-label">Densidad:</label>
                                <div class="col-12">
                                    <input id="densidad" type="number" step="any" class="form-control orina" name="densidad" value="{{old('densidad', $detaOrina->densidad)}}" placeholder="Densidad">
                                </div>
                            </div>

                            <div class="form-group has-feedback row orina" style="display: none;">
                                <label for="ph" class="col-12 control-label">PH:</label>
                                <div class="col-12">
                                    <input id="ph" type="number" step="any" class="form-control orina" name="ph" value="{{old('ph', $detaOrina->ph)}}" placeholder="PH">
                                </div>
                            </div>

                            <div class="form-group has-feedback row orina" style="display: none;">
                                <label for="nitritos" class="col-12 control-label">Nitritos:</label>
                                <div class="col-12">
                                    <input id="nitritos" type="text" class="form-control orina" name="nitritos" value="{{old('nitritos', $detaOrina->nitritos)}}" placeholder="Nitritos">
                                </div>
                            </div>

                            <div class="form-group has-feedback row orina" style="display: none;">
                                <label for="proteinas" class="col-12 control-label">Proteinas:</label>
                                <div class="col-12">
                                    <input id="proteinas" type="number" step="any" class="form-control orina" name="proteinas" value="{{old('proteinas', $detaOrina->proteinas)}}" placeholder="Proteinas">
                                </div>
                            </div>

                            <div class="form-group has-feedback row orina" style="display: none;">
                                <label for="glucosOrina" class="col-12 control-label">Glucosa:</label>
                                <div class="col-12">
                                    <input id="glucosOrina" type="text" class="form-control orina" name="glucosOrina" value="{{old('glucosOrina', $detaOrina->glucosOrina)}}" placeholder="Glucosa">
                                </div>
                            </div>

                            <div class="form-group has-feedback row orina" style="display: none;">
                                <label for="cetonicos" class="col-12 control-label">Cetonicos:</label>
                                <div class="col-12">
                                    <input id="cetonicos" type="text" class="form-control orina" name="cetonicos" value="{{old('cetonicos', $detaOrina->cetonicos)}}" placeholder="Cetonicos">
                                </div>
                            </div>

                            <div class="form-group has-feedback row orina" style="display: none;">
                                <label for="urobilinogeno" class="col-12 control-label">Urobilinogeno:</label>
                                <div class="col-12">
                                    <input id="urobilinogeno" type="text" class="form-control orina" name="urobilinogeno" value="{{old('urobilinogeno', $detaOrina->urobilinogeno)}}" placeholder="Urobilinogeno">
                                </div>
                            </div>

                            <div class="form-group has-feedback row orina" style="display: none;">
                                <label for="bilirrubina" class="col-12 control-label">Bilirrubina:</label>
                                <div class="col-12">
                                    <input id="bilirrubina" type="text" class="form-control orina" name="bilirrubina" value="{{old('bilirrubina', $detaOrina->bilirrubina)}}" placeholder="Bilirrubina">
                                </div>
                            </div>
                        </div>



                        <div class="col-sm-4">
                            <!--ORINA-->
                            <div class="form-group has-feedback row orina" style="display: none;">
                                <label for="SangreOculta" class="col-12 control-label">Sangre oculta:</label>
                                <div class="col-12">
                                    <input id="SangreOculta" type="text" class="form-control orina" name="SangreOculta" value="{{old('SangreOculta', $detaOrina->SangreOculta)}}" placeholder="Sangre oculta">
                                </div>
                            </div>

                            <div class="form-group has-feedback row orina" style="display: none;">
                                <label for="leucocitaria" class="col-12 control-label">leucocitaria:</label>
                                <div class="col-12">
                                    <input id="leucocitaria" type="text" class="form-control orina" name="leucocitaria" value="{{old('leucocitaria', $detaOrina->leucocitaria)}}" placeholder="Leucocitaria">
                                </div>
                            </div>

                            <div class="form-group has-feedback row orina" style="display: none;">
                                <label for="hemoglobinaOrina" class="col-12 control-label">Hemoglobina:</label>
                                <div class="col-12">
                                    <input id="hemoglobinaOrina" type="text" class="form-control orina" name="hemoglobinaOrina" value="{{old('hemoglobinaOrina', $detaOrina->hemoglobinaOrina)}}" placeholder="Hemoglobina">
                                </div>
                            </div>

                            <div class="form-group has-feedback row orina" style="display: none;">
                                <label for="cilindros" class="col-12 control-label">Cilindros:</label>
                                <div class="col-12">
                                    <input id="cilindros" type="text" class="form-control orina" name="cilindros" value="{{old('cilindros', $detaOrina->cilindros)}}" placeholder="Cilindros">
                                </div>
                            </div>

                            <div class="form-group has-feedback row orina" style="display: none;">
                                <label for="hematiesOrina" class="col-12 control-label">Hematies:</label>
                                <div class="col-12">
                                    <input id="hematiesOrina" type="text" class="form-control orina" name="hematiesOrina" value="{{old('hematiesOrina', $detaOrina->hematiesOrina)}}" placeholder="hematiesOrina">
                                </div>
                            </div>

                            <div class="form-group has-feedback row orina" style="display: none;">
                                <label for="leucocitosOrina" class="col-12 control-label">Leucocitos:</label>
                                <div class="col-12">
                                    <input id="leucocitosOrina" type="text" class="form-control orina" name="leucocitosOrina" value="{{old('leucocitosOrina', $detaOrina->leucocitosOrina)}}" placeholder="Leucocitos">
                                </div>
                            </div>

                            <div class="form-group has-feedback row orina" style="display: none;">
                                <label for="escamosas" class="col-12 control-label">Escamosas:</label>
                                <div class="col-12">
                                    <input id="escamosas" type="text" class="form-control orina" name="escamosas" value="{{old('escamosas', $detaOrina->escamosas)}}" placeholder="Escamosas">
                                </div>
                            </div>

                            <div class="form-group has-feedback row orina" style="display: none;">
                                <label for="oxalatosCalcio" class="col-12 control-label">Oxalatos calcio:</label>
                                <div class="col-12">
                                    <input id="oxalatosCalcio" type="text" class="form-control orina" name="oxalatosCalcio" value="{{old('oxalatosCalcio', $detaOrina->oxalatosCalcio)}}" placeholder="Oxalatos calcio">
                                </div>
                            </div>

                            <div class="form-group has-feedback row orina" style="display: none;">
                                <label for="bacteriasOrina" class="col-12 control-label">Bacterias:</label>
                                <div class="col-12">
                                    <input id="bacteriasOrina" type="text" class="form-control orina" name="bacteriasOrina" value="{{old('bacteriasOrina', $detaOrina->bacteriasOrina)}}" placeholder="Bacterias">
                                </div>
                            </div>

                            <div class="form-group has-feedback row orina" style="display: none;">
                                <label for="parasitologico" class="col-12 control-label">Parasito logico:</label>
                                <div class="col-12">
                                    <input id="parasitologico" type="text" class="form-control orina" name="parasitologico" value="{{old('parasitologico', $detaOrina->parasitologico)}}" placeholder="Parasito logico">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group has-feedback row orina" style="display: none;">
                                <label for="observacionesOrina" class="col-12 control-label">Observaciones:</label>
                                <div class="col-12">
                                    <textarea rows="5" cols="50" id="observacionesOrina" type="text" class="form-control orina" name="observacionesOrina" value="{{old('observacionesOrina', $detaOrina->observacionesOrina)}}" placeholder="Observaciones">{{old('observacionesOrina', $detaOrina->observacionesOrina)}}</textarea>
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