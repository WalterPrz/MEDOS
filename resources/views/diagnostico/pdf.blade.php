@extends('admin.layouts.index')
@section('title','Diagnostico')
@section('content')

<div class="container">
    
        <div class="row py-lg-2">
            <div class="col-md-6">
               <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
            <!-- Html2Pdf  -->
            <script src=
        "https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.8.1/html2pdf.bundle.min.js" 
                integrity=
        "sha512vDKWohFHe2vkVWXHp3tKvIxxXg0pJxeid5eo+UjdjME3DBFBn2F8yWOE0XmiFcFbXxrEOR1JriWEno5Ckpn15A==" 
                crossorigin="anonymous">
            
            <script src='https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js'></script>
            </script>
            </div>
        </div>
            <!-- Page Heading -->
            <div class="d-sm-flex align-items-center justify-content-between mb-4">
                <h1 class="h3 mb-0 text-gray-800">Receta Médica</h1>
                <div class="pull-right">
                    <input type="button" class="btn btn-dark btn-lg float-md-right" 
                    onclick="GeneratePdf();" value="Imprimir Receta" >     
                </div>
            </div>
        <div class="container-fluid" id="recetaPDF">

            <!-- Content Row -->

            <div class="row">

                <!-- Area Chart -->
                <div class="col-xl-12 col-lg-12">
                    <div class="card shadow mb-4">
                        <!-- Card Header - Dropdown -->

                        <div class="card-header bg-secondary py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                            <h5 class="m-0 font-weight-bold text-white">Clinica Medica La Mega</h5>
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div>
                        <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between">
                            <svg xmlns="http://www.w3.org/2000/svg" width="64" height="64" fill="currentColor" class="bi bi-capsule-pill" viewBox="0 0 16 16">
                                <path fill-rule="evenodd" d="M11.02 5.364a3 3 0 0 0-4.242-4.243L1.121 6.778a3 3 0 1 0 4.243 4.243l5.657-5.657Zm-6.413-.657 2.878-2.879a2 2 0 1 1 2.829 2.829L7.435 7.536 4.607 4.707ZM12 8a4 4 0 1 1 0 8 4 4 0 0 1 0-8Zm-.5 1.041a3 3 0 0 0 0 5.918V9.04Zm1 5.918a3 3 0 0 0 0-5.918v5.918Z"/>
                              </svg>                           
                            <h6 class="m-0 font-weight-bold text-dark">Medicina General, enfermedades niños y adultos,</br>
                            enfermedades de la mujer y control de niño sano</h6>
                            <h7 class="m-0 font-weight text-dark-50 small"><b>Horario Consultas</b></br>&nbsp;&nbsp;Lunes a Sábado</br>8:00 am a 4:00pm&nbsp;&nbsp;</br></h7>

                        </div>
                        <!-- Card Body -->
                        <div class="card-body">
                            <div class="chart-area">
                                <div class="chartjs-size-monitor">
                                        <div class="font-weight"><b>Paciente:</b>&nbsp;{{$paciente}}
                                            </div>
                                    <div class="chartjs-size-monitor-expand">
                                        <div class=""></br><b>Receta:</b>&nbsp;{{$valor}}
                                            </div>
                                        </div>
                                    </div>
                                <canvas id="myAreaChart" style="display: block; height: 90px; width: 200px;" width="480" height="240" class="chartjs-render-monitor"></canvas>
                            </div>

                            <div>Firma:&nbsp;__________________________________</div>
                        </div>

                        <div class="card-footer bg-secondary py-3 d-flex flex-row align-items-center justify-content-between">
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                            <h7 class="m-0 font-weight text-white-50">Clinica Medica La Mega</h7>
                            <h6 class="m-0 font-weight-bold text-primary"></h6>
                        </div>
                    </div>
                </div>
            </div>


        </div>


</div>
@endsection

<script>          
    // Function to GeneratePdf
    function GeneratePdf() {
        var element = document.getElementById('recetaPDF');
        html2pdf(element);

    }
</script>