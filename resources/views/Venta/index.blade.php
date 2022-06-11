@extends('layouts.plantilla')
@section('title', 'Ventas')
@section('content')
    <div>
        <h1>Ventas</h1>
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                    type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Crear Venta</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                    type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Consultar
                    Ventas</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane"
                    type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Ventas AÚN SIN
                    COMPLETAR</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"
                tabindex="0">
                <form action="{{ route('venta.store') }}" method="POST">
                    @csrf
                    <button type="submit" class="btn btn-success">Crear una Venta</button>
                </form>
            </div>
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <form action="{{ route('venta.index') }}" method="GET">
                    @csrf
                    <div class="row">
                        <div class="col-sm-2">
                            <input  class="form-control" type="date" id="start" name="fecha_venta" min="2022-01-01">
                        </div>
                        <div class="col-sm-3">
                            <button type="submit" class="btn btn-success">Filtrar</button>
                        </div>
                    </div>
                </form>
                
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">fecha</th>
                            <th scope="col">Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ventas as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->fecha_venta }}</td>
                                <td>
                                    <a href="{{ route('venta.detalle', $item->id) }}" class="btn btn-info">Ver
                                        Detalles</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">fecha</th>
                            <th scope="col">Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ventasSinCompletar as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->fecha_venta }}</td>
                                <td>
                                    <a href="{{ route('venta.detalle', $item->id) }}" class="btn btn-success">Ir a
                                        detalles</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
