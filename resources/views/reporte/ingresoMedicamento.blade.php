@extends('admin.layouts.index')
@section('title', 'Reportes Graficos')
@section('content')
    <div class="row py-lg-2">
        <div class="col-md-6">
            <h2>Reportes</h2>
            <script src="https://code.highcharts.com/highcharts.js"></script>
            <script src="https://code.highcharts.com/modules/exporting.js"></script>
            <script src="https://code.highcharts.com/modules/export-data.js"></script>
            <script src="https://code.highcharts.com/modules/accessibility.js"></script>
            <script src="https://code.highcharts.com/themes/brand-dark.js"></script>
            {{-- <script src="https://code.highcharts.com/themes/dark-unica.js"></script> --}}

        </div>
    </div>

    <div>
        <div class="row">
            <div class="col-6">
                <figure class="highcharts-figure">
                    <div id="container"></div>
                    <p class="highcharts-description">
                        Ese grafico permite observar la cantidad de medicamentos en tiempo real dentro del inventario
                    </p>
                </figure>
            </div>
            <div class="col-6">
                
                <figure class="highcharts-figure">
                    <div id="container2"></div>
                    <p class="highcharts-description">
                        Ese grafico permite observar la cantidad de ventas realizadas en la semana
                    </p>
                </figure>
            </div>
        </div>







    @section('js_user_page')

        <script>
            Highcharts.chart('container', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Inventario medicamentos'
                },
    
                xAxis: {
                    categories: [
                        'Medicamentos'
                    ],
                    crosshair: true
                },
                yAxis: {
                    title: {
                        useHTML: true,
                        text: 'Cantidad de medicamentos Inventario'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.30,
                        borderWidth: 0
                    }
                },
                series: <?= $data ?>
            });

            

            Highcharts.chart('container2', {
                chart: {
                    type: 'column'
                },
                title: {
                    text: 'Ventas semanales'
                },
    
                xAxis: {
                    categories: [
                        'VENTAS'
                    ],
                    crosshair: true
                },
                yAxis: {
                    title: {
                        useHTML: true,
                        text: 'Ventas semana actual'
                    }
                },
                tooltip: {
                    headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                    pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                        '<td style="padding:0"><b>{point.y:.1f}</b></td></tr>',
                    footerFormat: '</table>',
                    shared: true,
                    useHTML: true
                },
                plotOptions: {
                    column: {
                        pointPadding: 0.05,
                        borderWidth: 0
                    }
                },
                series: <?= $dataVenta ?>
            });
        </script>
        
    @endsection
@endsection
