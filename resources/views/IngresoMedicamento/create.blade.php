@extends('admin.layouts.index')
@section('title','Ingresar medicamento')
@section('content')
<div>
  <h1>Ingresar medicamentos</h1>
  <ul class="nav nav-tabs" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Consultar ingresos</button>
        </li>
        <li class="nav-item" role="presentation">
            <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Ingresar medicamento</button>
        </li>
    </ul>


    <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"tabindex="0">

        <div class="container-fluid">
            <form class="d-flex" role="search">
            <input name="fechaIngreso" class="form-control me-2" type="date" placeholder="Buscar por nombre medicamento" aria-label="Buscar">
            <button class="btn btn-outline-success" type="submit">Filtar</button>
            </form>
         </div>
            <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Proveedor</th>
                            <th scope="col">Fecha Ingreso</th>
                            <th scope="col">Ver</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($ingresoMedicamentos as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->nombreProveedor}}</td>
                                <td>{{ $item->fechaIngreso }}</td>
                                <td>
                                    <a href="{{ route('ingresomed.detalle_consulta', $item->id) }}" class="btn btn-info">Ver Detalles</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>

            </div>
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
            <form action="{{route('ingresomed.store')}}" method='POST'>
                    @csrf
                    <div class='form-row'>
                    <div id='campo1' class='col-md-4'>
                        <label for='proveedor'>Proveedor</label>
                        <select id='proveedor' name='proveedor' class='form-select'>
                            <option selected='true' disabled='disabled'>Seleccionar proveedor</option>
                            @foreach( $proveedors as $item )
                                <option value="{{ $item->id }}">{{ $item->nombreProveedor }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class='col-md-4'>
                        <label for='fechaIngreso'>Fecha del ingreso</label>
                        <input id='fechaIngreso' type='text' value="{{ date('d-m-Y') }}" class='form-control' name='fechaIngreso' disabled placeholder='Fecha'>
                    </div>
                    </div>
                    <button type='submit' id='guardar' class='btn btn-primary'>Guardar</button>
                </form>

            </div>
        </div>






</div>
@endsection
