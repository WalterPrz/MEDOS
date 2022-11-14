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
            <form method="POST" action="{{route('examen.updateHemo', ['examen'=> $examen->id, 'detaHemo'=> $detaHemo->id] )}}" enctype="multipart/form-data" class="mb-0 needs-validation" role="form">
                @method('PUT')d
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



                            <!--HEMOGRAMA-->
                            <div class="form-group has-feedback row hemograma" style="display: none;">
                                <label for="globRojos" class="col-12 control-label">Globulos rojos:</label>
                                <div class="col-12">
                                    <input id="globRojos" type="number" class="form-control hemograma" name="globRojos" value="{{old('globRojos', $detaHemo->globRojos)}}" placeholder="Globulos rojos">
                                </div>
                            </div>

                            <div class="form-group has-feedback row hemograma" style="display: none;">
                                <label for="hematocrito" class="col-12 control-label">Hematocrito:</label>
                                <div class="col-12">
                                    <input id="hematocrito" type="number" step="any" class="form-control hemograma" name="hematocrito" value="{{old('hematocrito', $detaHemo->hematocrito)}}" placeholder="hematocrito">
                                </div>
                            </div>

                            <div class="form-group has-feedback row hemograma" style="display: none;">
                                <label for="hemoglobinaHemo" class="col-12 control-label">Hemoglobina:</label>
                                <div class="col-12">
                                    <input id="hemoglobinaHemo" type="number" step="any" class="form-control hemograma" name="hemoglobinaHemo" value="{{old('hemoglobinaHemo', $detaHemo->hemoglobinaHemo)}}" placeholder="Hemoglobina">
                                </div>
                            </div>

                            <div class="form-group has-feedback row hemograma" style="display: none;">
                                <label for="vcm" class="col-12 control-label">VCM:</label>
                                <div class="col-12">
                                    <input id="vcm" type="number" step="any" class="form-control hemograma" name="vcm" value="{{old('vcm', $detaHemo->vcm)}}" placeholder="VCM">
                                </div>
                            </div>

                            <div class="form-group has-feedback row hemograma" style="display: none;">
                                <label for="hbcm" class="col-12 control-label">HBCM:</label>
                                <div class="col-12">
                                    <input id="hbcm" type="number" step="any" class="form-control hemograma" name="hbcm" value="{{old('hbcm', $detaHemo->hbcm)}}" placeholder="HBCM">
                                </div>
                            </div>

                            <div class="form-group has-feedback row hemograma" style="display: none;">
                                <label for="chbcm" class="col-12 control-label">CHBCM:</label>
                                <div class="col-12">
                                    <input id="chbcm" type="number" step="any" class="form-control hemograma" name="chbcm" value="{{old('chbcm', $detaHemo->chbcm)}}" placeholder="CHBCM">
                                </div>
                            </div>

                            <div class="form-group has-feedback row hemograma" style="display: none;">
                                <label for="plaquetas" class="col-12 control-label">Plaquetas:</label>
                                <div class="col-12">
                                    <input id="plaquetas" type="number" class="form-control hemograma" name="plaquetas" value="{{old('plaquetas', $detaHemo->plaquetas)}}" placeholder="Plaquetas">
                                </div>
                            </div>

                            <div class="form-group has-feedback row hemograma" style="display: none;">
                                <label for="vn" class="col-12 control-label">VN:</label>
                                <div class="col-12">
                                    <input id="vn" type="text" class="form-control hemograma" name="vn" value="{{old('vn', $detaHemo->vn)}}" placeholder="VN">
                                </div>
                            </div>

                            <div class="form-group has-feedback row hemograma" style="display: none;">
                                <label for="reticulocitos" class="col-12 control-label">Reticulocitos:</label>
                                <div class="col-12">
                                    <input id="reticulocitos" type="text" class="form-control hemograma" name="reticulocitos" value="{{old('reticulocitos', $detaHemo->reticulocitos)}}" placeholder="Reticulocitos">
                                </div>
                            </div>
                        
                        </div>



                        <div class="col-sm-4">

                            <!--HEMOGRAMA-->
                            <div class="form-group has-feedback row hemograma" style="display: none;">
                                <label for="eritrosedimentacion" class="col-12 control-label">Eritrosedimentacion:</label>
                                <div class="col-12">
                                    <input id="eritrosedimentacion" type="text" class="form-control hemograma" name="eritrosedimentacion" value="{{old('eritrosedimentacion', $detaHemo->eritrosedimentacion)}}" placeholder="Eritrosedimentacion">
                                </div>
                            </div>

                            <div class="form-group has-feedback row hemograma" style="display: none;">
                                <label for="globBlancos" class="col-12 control-label">Globulos Blancos:</label>
                                <div class="col-12">
                                    <input id="globBlancos" type="number" class="form-control hemograma" name="globBlancos" value="{{old('globBlancos', $detaHemo->globBlancos)}}" placeholder="Globulos Blancos">
                                </div>
                            </div>

                            <div class="form-group has-feedback row hemograma" style="display: none;">
                                <label for="neutrofilosBanda" class="col-12 control-label">Neutrofilos Banda:</label>
                                <div class="col-12">
                                    <input id="neutrofilosBanda" type="number" step="any" class="form-control hemograma" name="neutrofilosBanda" value="{{old('neutrofilosBanda', $detaHemo->neutrofilosBanda)}}" placeholder="Neutrofilos Banda">
                                </div>
                            </div>

                            <div class="form-group has-feedback row hemograma" style="display: none;">
                                <label for="neutrofilosSegmen" class="col-12 control-label">Neutrofilos Segmen:</label>
                                <div class="col-12">
                                    <input id="neutrofilosSegmen" type="number" step="any" class="form-control hemograma" name="neutrofilosSegmen" value="{{old('neutrofilosSegmen', $detaHemo->neutrofilosSegmen)}}" placeholder="Neutrofilos Segmen">
                                </div>
                            </div>

                            <div class="form-group has-feedback row hemograma" style="display: none;">
                                <label for="eosinofilios" class="col-12 control-label">Eosinofilios:</label>
                                <div class="col-12">
                                    <input id="eosinofilios" type="number" step="any" class="form-control hemograma" name="eosinofilios" value="{{old('eosinofilios', $detaHemo->eosinofilios)}}" placeholder="Eosinofilios">
                                </div>
                            </div>

                            <div class="form-group has-feedback row hemograma" style="display: none;">
                                <label for="basofilios" class="col-12 control-label">Basofilios:</label>
                                <div class="col-12">
                                    <input id="basofilios" type="number" step="any" class="form-control hemograma" name="basofilios" value="{{old('basofilios', $detaHemo->basofilios)}}" placeholder="Basofilios">
                                </div>
                            </div>

                            <div class="form-group has-feedback row hemograma" style="display: none;">
                                <label for="linfocitos" class="col-12 control-label">Linfocitos</label>
                                <div class="col-12">
                                    <input id="linfocitos" type="number" step="any" class="form-control hemograma" name="linfocitos" value="{{old('linfocitos', $detaHemo->linfocitos)}}" placeholder="Linfocitos">
                                </div>
                            </div>

                            <div class="form-group has-feedback row hemograma" style="display: none;">
                                <label for="monocitos" class="col-12 control-label">Monocitos:</label>
                                <div class="col-12">
                                    <input id="monocitos" type="number" step="any" class="form-control hemograma" name="monocitos" value="{{old('monocitos', $detaHemo->monocitos)}}" placeholder="Monocitos">
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group has-feedback row hemograma" style="display: none;">
                                <label for="observacionesHemo" class="col-12 control-label">Observaciones:</label>
                                <div class="col-12">
                                    <textarea rows="5" cols="50" id="observacionesHemo" type="text" class="form-control hemograma" name="observacionesHemo" value="{{old('observacionesHemo', $detaHemo->observacionesHemo)}}" placeholder="Observaciones">{{old('observacionesHemo', $detaHemo->observacionesHemo)}}</textarea>
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