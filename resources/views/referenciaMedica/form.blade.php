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

    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Referencia médica para paciente</h1>
        <div class="pull-right">
            <input type="button" class="btn btn-success btn-lg float-md-right" 
            onclick="GeneratePdf();" value="Imprimir referencia medica">     
        </div>
    </div>

    <div class="container-fluid" id="ref">

        <!-- Content Row -->

        <div class="row">

            <!-- Area Chart -->
            <div class="col-xl-12 col-lg-12">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->

                    <div class="card-header bg-dark py-3 d-flex flex-row align-items-center justify-content-between">
                        <i class='fas fa-file-medical-alt' style='font-size:36px;color:white'></i>
        
                          <h7 class="m-0 font-weight-bold text-white">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Referencia medica otorgada a paciente</br>&nbsp;&nbsp;&nbsp;&nbsp;</h7>
                        <h7 class="m-0 font-weight text-white-50 small"><b>Horario Consultas</b></br>&nbsp;&nbsp;Lunes a Sábado</br>8:00 am a 4:00pm&nbsp;&nbsp;</br></h7>

                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <div class="row">
                        <div class="chart-area">
                            <div class="chartjs-size-monitor">
                                <div class="col-md-12">
                                    <div class="form-group has-feedback row">
                                        <label for="nombre" class="col-12 control-label">&nbsp;&nbsp;Nombre del medico:</label>
                                        <div class="col-12">
                                          <input id="nombre" type="text" class="form-control" required="true" name="nombreMedico" placeholder="Nombre del medico" >
                                        </div>
                                    </div>
    
                                    <div class="form-group has-feedback row">
                                        <div class="col-6">
                                            <label  class="col-12 control-label">Nombres del paciente:</label>
                                          <input id="nombre" type="text" class="form-control" name="nombrePaciente" placeholder="Nombre del paciente" >
                                        </div>
                                        <div class="col-6">
                                            <label  class="col-12 control-label">Apellidos del paciente:</label>
                                            <input type="text" class="form-control" name="apellidoPaciente"  placeholder="Apellidos del paciente" >
                                        </div>
                                    </div>

                                    <div class="form-group has-feedback row">
                                        <div class="col-6">
                                            <label for="nombre" class="col-12 control-label">Sexo:</label>
                                          <input  type="text" class="form-control" name="sexo" placeholder="Sexo paciente" >
                                        </div>
                                        <div class="col-6">
                                            <label for="edad" class="col-12 control-label">Edad:</label>
                                            <input id="edad" type="number" class="form-control" name="edad" placeholder="Edad" >
                                        </div>
                                    </div>

                                    <div class="form-group has-feedback row">
                                        <label for="historia" class="col-12 control-label">&nbsp;&nbsp;Historia clínica:</label>
                                        <div class="col-12">
                                          <textarea name="historia" class="form-control" id="historia" rows="3"></textarea>
                                        </div>
                                    </div>
    
                                    <div class="form-group has-feedback row">
                                        <div class="col-sm-6">
                                                <label for="nombre" class="col-12 control-label">Fecha de emisión</label>
                                                <input  class="form-control float-md-right" type="date" id="current_date" name="fecha" min="2022-01-01">
                                        </div>
                                    </div>

                                    
                                    <div class="form-group has-feedback row">
                                        <div class="col-12">
                                            <label for="descripcion" class="col-12 control-label">Descripción de la referencia:</label>
                                            <textarea name="descripcion" class="form-control" value="{{old('descripcion')}}" id="descripcion" rows="3">{{old('descripcion')}}</textarea>
                                        </div>
                                    </div>
                            </div>
                            <canvas id="myAreaChart" style="display: block; height: 90px; width: 200px;" width="480" height="240" class="chartjs-render-monitor"></canvas>
                        </div>

                        <div>Firma:&nbsp;__________________________________</div>
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
            var element = document.getElementById('ref');
            html2pdf(element);
        }
    </script>
        <script>
        date = new Date();
        year = date.getFullYear();
        month = date.getMonth() + 1;
        day = date.getDate();
        document.getElementById("current_date").innerHTML = month + "/" + day + "/" + year;
        </script>
  
    <script src=
"https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"
        integrity=
"sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" 
        crossorigin="anonymous">
    </script>
@endsection