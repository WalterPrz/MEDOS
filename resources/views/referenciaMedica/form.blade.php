@extends('admin.layouts.index')

@section('content')

    <!-- Html2Pdf  -->
    <script src=
"https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.1/html2pdf.bundle.min.js" 
        integrity=
"sha512vDKWohFHe2vkVWXHp3tKvIxxXg0pJxeid5eo+UjdjME3DBFBn2F8yWOE0XmiFcFbXxrEOR1JriWEno5Ckpn15A==" 
        crossorigin="anonymous">
    </script>


<div class="container" >
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
                        Referencia medica pacientes 
                        <div class="pull-right">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm float-right" data-toggle="tooltip" data-placement="left" title data-original-title="Regresar a lista de categorias">Regresar</a>
                        </div>
                    </div>
                </div>
                <x-errores class="mb-4" />
                <form id="form_pdf" action="{{route('referenciaMedica.store')}}" method="post" target="blank">
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
                                            <input  class="form-control float-md-right" type="date" id="start" name="fecha" min="2022-01-01">
                                        </div>
        
                                              
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
                  </form>                 
                
                <div class="card-footer">
                    <div class="row">
                        <div class="pull-right">
                                <input type="button" class="btn btn-primary float-rigth" 
                                        onclick="GeneratePdf();" value="Emitir Referencia">
                        </div>
                        </div>
                </div>


                  </div>
        </div>
    </div>
</div>   
<div>

  <script>          
        // Function to GeneratePdf
        function GeneratePdf() {
            var element = document.getElementById('form_pdf');
            html2pdf(element);
        }
    </script>
  
    <script src=
"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity=
"sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" 
        crossorigin="anonymous">
    </script>
@endsection