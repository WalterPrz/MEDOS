@extends('admin.layouts.index')
@section('title','Diagnosticos')
@section('content')
<div class="row py-lg-2">
    <div class="col-md-6">
       <h2>Expediente</h2>
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <!-- Html2Pdf  -->
    <script src=
"https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.1/html2pdf.bundle.min.js" 
        integrity=
"sha512vDKWohFHe2vkVWXHp3tKvIxxXg0pJxeid5eo+UjdjME3DBFBn2F8yWOE0XmiFcFbXxrEOR1JriWEno5Ckpn15A==" 
        crossorigin="anonymous">
    </script>
    </div>
</div>
<div>
    <div class="container-fluid">
<form  role="search">
        <div style="display: flex; align-items: flex-start; margin-top: 1em;">
            <div class="col-sm-6">
                <input  name="texto" class="form-control float-md-right" type="search" placeholder="Buscar por expediente" aria-label="Buscar">
            </div>
                    <div class="col-sm-1">
                        <button type="submit" class="btn btn-success">Buscar</button>
                    </div>
          </div>
        </form>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
            <thead>
            <tr>
            <th scope="col">Nombre del paciente</th>
            <th scope="col">Edad del paciente</th>
            <th scope="col">Genero</th>

            
          </tr>
        </thead>
        <tbody>
            @foreach($expedientes as $item)
                <tr>
                <td scope="row">{{$item->nombrePaciente}}</td>
                <td>{{$item->edadPaciente}}</td>
                <td>{{$item->genero}}</td>
              </tr>
          @endforeach
        </tbody>
      </table>
</div>
</div>


</div>
<!--   ----------------------------------------------FORMULARIO-----------------------------------------------------------------        -->
<div class="row py-lg-2">
    <div class="col-md-6">
       <h2>Diagnosticos</h2>
    </div>


</div>
<div class="container">
    <div class="row">
        <div class="col-8">
            <div class="card card-post" id="post_card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        Creando diagnostico: 
                    </div>
                    <div class="pull-right">
                        <input type="button" class="btn btn-warning btn-lg float-md-right" 
                        onclick="GeneratePdf();" value="Imprimir Receta">     
                    </div>

                </div>

                <x-errores class="mb-4" />
                <form action="{{route('diagnostico.store')}}" method="POST">
                @csrf
                <div class="card-body">
                        <div class="row">                             
                            <div class="col-md-12">
                                <div class="form-group has-feedback row">
                                    <label for="peso" class="col-12 control-label"></label>
                                    <div class="col-12">
                                      <input id="idExpediente" type="hidden" class="form-control" name="idExpediente" 
                                      value="@foreach($expedientes as $item){{$item->id}}
                                            @endforeach" placeholder="Peso del paciente" >
                                    </div>
                                </div>
                                <div class="form-group has-feedback row">
                                    <label for="peso" class="col-12 control-label">Peso:</label>
                                    <div class="col-12">
                                      <input id="peso" type="text" class="form-control" name="peso" value="{{old('peso')}}" placeholder="Peso del paciente" >
                                    </div>
                                </div>
                                 <div class="form-group has-feedback row">
                                    <label for="altura" class="col-12 control-label">Altura:</label>
                                    <div class="col-12">
                                      <input id="altura" type="text" class="form-control" name="altura" value="{{old('altura')}}" placeholder="Altura del paciente" >
                                    </div>
                                </div>
                                
                                <div class="form-group has-feedback row">
                                    <label for="descripcionDiag" class="col-12 control-label">Descripcion de diagnostico:</label>
                                    <div class="col-12">
                                      <textarea name="descripcionDiag" class="form-control" value="{{old('descripcionDiag')}}" id="descripcion" rows="3">{{old('descripcionDiag')}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group has-feedback row" id="recetaPDF">
                                    <label for="receta" class="col-12 control-label">Descripcion Receta:</label>
                                    <div class="col-12">
                                      <textarea name="receta" id="receta" class="form-control" value="{{old('receta')}}" id="receta" rows="3">{{old('receta')}}</textarea>

                                    </div>
    
                                </div>
                            </div>
                          </div>
                 </div>

                 <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <span data-toggle="tooltip" title data-original-title="Guardar cambios realizados">
                                <button type="submit" class="btn btn-success btn-lg btn-block" value="Guardar" name="action">
                                    <i class="fa fa-save fa-fw">
                                        <span class="sr-only">
                                            Guardar categoria Icono
                                        </span>
                                    </i>
                                    Agregar diagnostico a paciente
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                  </form>

                  
        </div>

        
    </div>
 
</div> 
<script>          
    // Function to GeneratePdf
    function GeneratePdf() {
        var element = document.getElementById('recetaPDF');
        html2pdf(element);
    }
</script>

<script src=
"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity=
"sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" 
    crossorigin="anonymous">
</script>
<!-- ------------------------------------------FIN DE FORMULARIO ------------------------------------------->



<!--   AQui se listaban los diagnosticos -------------------------------------------------------

   <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable3" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th scope="col">Peso</th>
                <th scope="col">Altura</th>
                <th scope="col">Diagnostico</th>
                <th scope="col">Receta</th>
            
          </tr>
        </thead>
        <tfoot>
        <tr>
            <th scope="col">Peso</th>
            <th scope="col">Altura</th>
            <th scope="col">Diagnostico</th>
            <th scope="col">Receta</th>

          </tr>
        </tfoot>
        <tbody>
            @foreach($diagnosticos as $item)
                <tr>
                <td scope="row">{{$item->peso}}</td>
                <td>{{$item->altura}}</td>
                <td>{{$item->descripcionDiagnostico}}</td>
                <td>{{$item->descripcionReceta}}</td>

                </tr>
          @endforeach
        </tbody>
      </table>
</div>
</div>
-->
@section('js_diagnostico_page')

<script src=
"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
    integrity=
"sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" 
    crossorigin="anonymous">
</script>

<script>
    $(document).ready(function() {
    $('#dataTable3').DataTable({
      dom: '<"top"i>rt<"bottom"flp><"clear">',
      "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
    });
    });
    </script>
@endsection
@endsection
