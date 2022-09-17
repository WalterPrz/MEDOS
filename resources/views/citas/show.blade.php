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
                                Mostrando cita:
                            </span>
                            <div class="pull-right">
                                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm float-right" data-toggle="tooltip" data-placement="left" title="Regresar a lista de citas">Regresar</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Especialidad:
                                <span >
                                    {{$cita->especialidad}}
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Paciente
                                <span >
                                    {{$cita->paciente}}
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Fecha de cita:
                                <span >
                                    {{$cita->fecha_cita}}
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Hora de cita:
                                <span >
                                    {{$cita->hora_cita}}
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Descripción: 
                                <span >
                                    {{$cita->descripcion}}
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Estado:
                                @if($cita->estado == 1)
                                    <span class="badge badge-success">
                                        Pendiente
                                    </span>
                                @endif
                                @if($cita->estado != 1)
                                    <span class="badge badge-danger">
                                        Cancelada
                                    </span>
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection