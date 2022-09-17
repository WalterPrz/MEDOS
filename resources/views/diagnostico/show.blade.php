@extends('admin.layouts.index')

@section('content')


    <div class="container">
        <div class="row">
            <div class="col-sm-12"></div>
        </div>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-10 offset-lg-1">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                Detalle consulta medica:
                            </span>
                            <div class="pull-right">
                                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm float-right" data-toggle="tooltip" data-placement="left" title="Regresar a lista de visitas">Regresar</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        @foreach($diagnostico as $item)
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <strong>Fecha consulta:</strong>
                                <span >
                                    {{$item->fecha}}
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                               <strong>Nombre paciente:</strong>
                                <span >
                                    {{$item->nombrePaciente}}
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <strong>Peso:</strong>
                                <span >
                                    {{$item->peso}}
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                <strong>Altura:</strong>
                                <span >
                                    {{$item->altura}}
                                </span>
                            </li>
                            <li class="list-group-item  justify-content-between align-items-center">
                                <Strong>Diagnostico:</Strong>
                                <span >
                                    {{$item->descripcionDiagnostico}}
                                </span>
                            </li>
                            <li class="list-group-item  justify-content-between align-items-center">
                                <Strong>Receta:</Strong>
                                <span >
                                    {{$item->descripcionReceta}}
                                </span>
                            </li>
                        </ul>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
