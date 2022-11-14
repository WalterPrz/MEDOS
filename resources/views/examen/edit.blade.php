@extends('admin.layouts.index')

@section('content')

<div class="row">
    <div class="col-md-12">
        <div class="card card-post" id="post_card">
            <div class="card-header">
                <div style="display: flex; justify-content: space-between; align-items: center;">
                    Registrar examen:
                    <div class="pull-right">
                        <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm float-right" data-toggle="tooltip" data-placement="left" title data-original-title="Regresar a lista de citas">Regresar</a>
                    </div>
                </div>
            </div>
            <x-errores class="mb-4" />
            <form method="POST" action="/examen/{{ $examen->id }}" enctype="multipart/form-data" class="mb-0 needs-validation" role="form">
                @method('PATCH')
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
                                    <select disabled id="tipoExamen" class="form-control" name="tipoExamen" value="{{old('tipoExamen', $examen->tipoExamen)}}" placeholder="Tipo de examen">
                                        <option selected value="$examen->tipoExamen">{{$examen->tipoExamen}}</option>
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


                            <!--ORINA-->
                            <div class="form-group has-feedback row orina" style="display: none;">
                                <label for="colorOrina" class="col-12 control-label">Color:</label>
                                <div class="col-12">
                                    <input id="colorOrina" type="text" class="form-control orina" name="colorOrina" value="{{old('colorOrina', $detaOrina->macroscopicos)}}" placeholder="Color">
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
                                    <input id="densidad" type="number" step="any" class="form-control orina" name="densidad" value="{{old('densidad', $detaOrina->densidad0)}}" placeholder="Densidad">
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
                                    <input id="bilirrubina" type="text" class="form-control orina" name="bilirrubina" value="{{old('bilirrubina', $detaOrina->cetobilirrubinanicos)}}" placeholder="Bilirrubina">
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
                                    <input id="trofozoitos" type="text" class="form-control heces" name="trofozoitos" value="{{old('Trofozoitos', $detaHeces->Trofozoitos)}}" placeholder="Trofozoitos">
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
                            <div class="form-group has-feedback row sanguineo" style="display: none;">
                                <label for="observacionesSangui" class="col-12 control-label">Observaciones:</label>
                                <div class="col-12">
                                    <textarea rows="5" cols="50" id="observacionesSangui" type="text" class="form-control sanguineo" name="observacionesSangui" value="{{old('observacionesSangui', $detaSangui->observacionesSangui)}}" placeholder="Observaciones">{{old('observacionesSangui', $detaSangui->observacionesSangui)}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group has-feedback row hemograma" style="display: none;">
                                <label for="observacionesHemo" class="col-12 control-label">Observaciones:</label>
                                <div class="col-12">
                                    <textarea rows="5" cols="50" id="observacionesHemo" type="text" class="form-control hemograma" name="observacionesHemo" value="{{old('observacionesHemo', $detaSangui->observacionesHemo)}}" placeholder="Observaciones">{{old('observacionesHemo', $detaSangui->observacionesHemo)}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group has-feedback row heces" style="display: none;">
                                <label for="observacionesHeces" class="col-12 control-label">Observaciones:</label>
                                <div class="col-12">
                                    <textarea rows="5" cols="50" id="observacionesHeces" type="text" class="form-control heces" name="observacionesHeces" value="{{old('observacionesHeces', $detaSangui->observacionesHeces)}}" placeholder="Observaciones">{{old('observacionesHeces', $detaSangui->observacionesHeces)}}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-12">
                            <div class="form-group has-feedback row orina" style="display: none;">
                                <label for="observacionesOrina" class="col-12 control-label">Observaciones:</label>
                                <div class="col-12">
                                    <textarea rows="5" cols="50" id="observacionesOrina" type="text" class="form-control orina" name="observacionesOrina" value="{{old('observacionesOrina', $detaSangui->observacionesOrina)}}" placeholder="Observaciones">{{old('observacionesOrina', $detaSangui->observacionesOrina)}}</textarea>
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