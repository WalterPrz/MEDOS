@extends('admin.layouts.index')
@section('title','Ingresar medicamento')
@section('content')
<div>
  <h2>Ingresar medicamentos</h2>
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
            <form  role="search">
            <div style="display: flex; align-items: flex-start; margin-top: 1em;">
                        <div class="col-sm-6">
                            <input  class="form-control float-md-right" type="date" id="start" name="fecha_venta" min="2022-01-01">
                        </div>
                        <div class="col-sm-1">
                            <button type="submit" class="btn btn-success">Filtrar</button>
                        </div>
                    </div>
            </form>
         </div>
         <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable15" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">Proveedor</th>
                            <th scope="col">Fecha Ingreso</th>
                            <th scope="col">Ver</th>
                        </tr>
                    </thead>
                    <tfoot>
                    <tr>
                            <th scope="col">id</th>
                            <th scope="col">Proveedor</th>
                            <th scope="col">Fecha Ingreso</th>
                            <th scope="col">Ver</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($ingresoMedicamentos as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->nombreProveedor}}</td>
                                <td>{{ $item->fechaIngreso }}</td>
                                <td>
                                    <a href="{{ route('ingresomed.detalle_consulta', $item->id) }}"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
            </div>
            <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
            <x-errores class="mb-4" />
            <form action="{{route('ingresomed.store')}}" method='POST'>
                    @csrf
                    <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group has-feedback row">
                      <label for="proveedor" class="col-12 control-label">Seleccionar proveedor</label>
                      <div class="col-12">
                        <select class="proveedor form-control" name="proveedor" id="proveedor">
                        <option selected='true' disabled='disabled'>Seleccionar proveedor</option>
                            @foreach( $proveedors as $item )
                                <option value="{{ $item->id }}">{{ $item->nombreProveedor }}</option>
                            @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="form-group has-feedback row">
                      <label for="fechaIngreso" class="col-12 control-label">Fecha del ingreso:</label>
                      <div class="col-12">
                        <input id='fechaIngreso' type='text' value="{{ date('d-m-Y') }}" class='form-control' name='fechaIngreso' disabled placeholder='Fecha'>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                  <div class="card-footer">
                    <div class="row">
                      <div class="col-md-6">
                        <span data-toggle="tooltip" title data-original-title="Guardar">
                          <button type="submit" class="btn btn-success btn-lg btn-block" id="guardar" value="Guardar" name="action">
                            <i class="fa fa-save fa-fw">
                              <span class="sr-only">
                                Guardar Icono
                              </span>
                            </i>
                            Guardar 
                          </button>
                        </span>
                      </div>
                    </div>
                </form>

            </div>
        </div>

</div>
@section('js_venta_page')

<script>
    $(document).ready(function() {
    $('#dataTable15').DataTable({
        dom: '<"top"i>rt<"bottom"flp><"clear">',
        "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
    });
});
</script>

@endsection
@endsection
