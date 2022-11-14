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
            <form method="POST" action="{{route('detaheces.update', ['examen'=> $examen->id, 'detaHeces'=> $detaHeces->id] )}}" enctype="multipart/form-data" class="mb-0 needs-validation" role="form">
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
                            <!--HECES-->
                            <div class="form-group has-feedback row heces" style="display: none;">
                                <label for="colorHeces" class="col-12 control-label">Color:</label>
                                <div class="col-12">
                                    <input id="colorHeces" type="text" class="form-control heces" name="colorHeces" value="{{old('colorHeces', $detaHeces->colorHeces)}}" placeholder="Color">
                                </div>
                            </div>

                            <div class="form-group has-feedback row heces" style="display: none;">
                                <label for="consistencia" class="col-12 control-label">Consistencia:</label>
                                <div class="col-12">
                                    <input id="consistencia" type="text" class="form-control heces" name="consistencia" value="{{old('consistencia', $detaHeces->consistencia)}}" placeholder="Consistencia">
                                </div>
                            </div>

                            <div class="form-group has-feedback row heces" style="display: none;">
                                <label for="mucus" class="col-12 control-label">Mucus:</label>
                                <div class="col-12">
                                    <input id="mucus" type="text" class="form-control heces" name="mucus" value="{{old('mucus', $detaHeces->mucus)}}" placeholder="Mucus">
                                </div>
                            </div>

                            <div class="form-group has-feedback row heces" style="display: none;">
                                <label for="bacteriasHeces" class="col-12 control-label">Bacterias:</label>
                                <div class="col-12">
                                    <input id="bacteriasHeces" type="text" class="form-control heces" name="bacteriasHeces" value="{{old('bacteriasHeces', $detaHeces->bacteriasHeces)}}" placeholder="Bacterias">
                                </div>
                            </div>

                            <div class="form-group has-feedback row heces" style="display: none;">
                                <label for="hematiesHeces" class="col-12 control-label">Hematies:</label>
                                <div class="col-12">
                                    <input id="hematiesHeces" type="text" class="form-control heces" name="hematiesHeces" value="{{old('hematiesHeces', $detaHeces->hematiesHeces)}}" placeholder="Hematies">
                                </div>
                            </div>

                            <div class="form-group has-feedback row heces" style="display: none;">
                                <label for="leucocitosHeces" class="col-12 control-label">Leucocitos:</label>
                                <div class="col-12">
                                    <input id="leucocitosHeces" type="text" class="form-control heces" name="leucocitosHeces" value="{{old('leucocitosHeces', $detaHeces->leucocitosHeces)}}" placeholder="Leucocitos">
                                </div>
                            </div>

                            <div class="form-group has-feedback row heces" style="display: none;">
                                <label for="macroscopicos" class="col-12 control-label">Macroscopicos:</label>
                                <div class="col-12">
                                    <input id="macroscopicos" type="text" class="form-control heces" name="macroscopicos" value="{{old('macroscopicos', $detaHeces->macroscopicos)}}" placeholder="Macroscopicos">
                                </div>
                            </div>
                        </div>



                        <div class="col-sm-4">
                            <!--HECES-->
                            <div class="form-group has-feedback row heces" style="display: none;">
                                <label for="microscopicos" class="col-12 control-label">Microscopicos:</label>
                                <div class="col-12">
                                    <input id="microscopicos" type="text" class="form-control heces" name="microscopicos" value="{{old('microscopicos', $detaHeces->microscopicos)}}" placeholder="Microscopicos">
                                </div>
                            </div>

                            <div class="form-group has-feedback row heces" style="display: none;">
                                <label for="trofozoitos" class="col-12 control-label">Trofozoitos:</label>
                                <div class="col-12">
                                    <input id="trofozoitos" type="text" class="form-control heces" name="trofozoitos" value="{{old('trofozoitos', $detaHeces->trofozoitos)}}" placeholder="Trofozoitos">
                                </div>
                            </div>

                            <div class="form-group has-feedback row heces" style="display: none;">
                                <label for="quistes" class="col-12 control-label">Quistes:</label>
                                <div class="col-12">
                                    <input id="quistes" type="text" class="form-control heces" name="quistes" value="{{old('quistes', $detaHeces->quistes)}}" placeholder="Quistes">
                                </div>
                            </div>

                            <div class="form-group has-feedback row heces" style="display: none;">
                                <label for="huevos" class="col-12 control-label">Huevos:</label>
                                <div class="col-12">
                                    <input id="huevos" type="text" class="form-control heces" name="huevos" value="{{old('huevos', $detaHeces->huevos)}}" placeholder="Huevos">
                                </div>
                            </div>

                            <div class="form-group has-feedback row heces" style="display: none;">
                                <label for="larvas" class="col-12 control-label">Larvas:</label>
                                <div class="col-12">
                                    <input id="larvas" type="text" class="form-control heces" name="larvas" value="{{old('larvas', $detaHeces->larvas)}}" placeholder="Larvas">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group has-feedback row heces" style="display: none;">
                                <label for="observacionesHeces" class="col-12 control-label">Observaciones:</label>
                                <div class="col-12">
                                    <textarea rows="5" cols="50" id="observacionesHeces" type="text" class="form-control heces" name="observacionesHeces" value="{{old('observacionesHeces', $detaHeces->observacionesHeces)}}" placeholder="Observaciones">{{old('observacionesHeces', $detaHeces->observacionesHeces)}}</textarea>
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