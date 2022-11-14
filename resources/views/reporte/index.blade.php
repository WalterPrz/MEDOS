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
            {{-- <script src="https://code.highcharts.com/themes/brand-dark.js"></script> --}}
            <script src="https://code.highcharts.com/themes/dark-unica.js"></script>

        </div>
    </div>

    <div>
        <div class="row">
            <div class="col-sm-7">
                <figure class="highcharts-figure">
                    <div id="container"></div>
                    <div class="alert alert-dark" role="alert">

                    </div>
                </figure>
            </div>
            <div class="col-sm-5">
                <br><br><br>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Inventario de medicamentos</h5>
                    <p class="card-text">El gráfico refleja todos los medicamentos que se encuentran disponibles 
                        dentro de el inventario de la Farmacia La Mega.</p>
                    <a href="/inventario" class="btn btn-dark">Ver Inventario</a>
                  </div>
                </div>
              </div>

        </div>

        <div class="row">
            <div class="col-sm-5">
                <br><br><br>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Ventas semanales</h5>
                    <p class="card-text">Dentro de este gráfico se presenta la cantidad de ventas hechas cada dia de la semana
                        dentro de la Farmacia La Mega.</p>
                    <a href="/ventas" class="btn btn-dark">Ir a ventas</a>
                  </div>
                </div>
              </div>

            <div class="col-7">
                <figure class="highcharts-figure">
                    <div id="container2"></div>
                    <div class="alert alert-dark" role="alert">

                    </div>
                </figure>
            </div>

        </div>

        <div class="row">
            <div class="col-7">
                <figure class="highcharts-figure">
                    <div id="container3"></div>
                    <div class="alert alert-dark" role="alert">

                    </div>
                </figure>
            </div>
            <div class="col-sm-5">
                <br><br><br>
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title">Credito total</h5>
                    <p class="card-text">Aquí se presentan el total de los créditos brindados por los proveedores.</p>
                    <a href="/credito" class="btn btn-dark">Ir a créditos</a>
                  </div>
                </div>
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
                headerFormat: '<span style="font-size:20px">{point.key}</span><table>',
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



        Highcharts.chart('container3', {
            chart: {
                type: 'bar'
            },
            title: {
                text: 'Credito total de cada proveedor'
            },

            xAxis: {
                categories: [
                    'Proveedores'
                ],
                crosshair: true
            },
            yAxis: {
                title: {
                    useHTML: true,
                    text: 'Creditos totales'
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
                    pointPadding: 0.1,
                    borderWidth: 0
                }
            },
            series: <?= $dataCredito ?>
        });
    </script>

@endsection
@endsection
