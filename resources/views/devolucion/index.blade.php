@extends('admin.layouts.index')
@section('title','Devoluciones')
@section('content')
<div class="row py-lg-2">
    <div class="col-md-6">
       <h2>Devluciones</h2>
    </div>
    <div class="col-md-6">
        <form action="{{route('detalledevolucion.index')}}" method="GET">
            @csrf
            <button type="submit" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Crear una Devolucion</button>
        </form> 
    </div>
</div>
<div>
    <div class="container-fluid">
        <form  role="search">
        <div style="display: flex; align-items: flex-start; margin-top: 1em;">
            <div class="col-sm-6">
                <input  name="buscarpor" class="form-control float-md-right" type="search" placeholder="Buscar por nombre medicamento" aria-label="Buscar">
            </div>
                    <div class="col-sm-1">
                        <button type="submit" class="btn btn-success">Buscar</button>
                    </div>
          </div>
        </form>
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable25" width="100%" cellspacing="0">
            <thead>
            <tr>
            <th scope="col">Fecha de devolución</th>
            <th scope="col">Monto Descuentop</th>
            <th scope="col">Total medicamentos devueltos</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tfoot>
        <tr>
            <th scope="col">Fecha de devolución</th>
            <th scope="col">Monto Descuentop</th>
            <th scope="col">Total medicamentos devueltos</th>
            <th scope="col">Acciones</th>
          </tr>
        </tfoot>
        <tbody>

        </tbody>
      </table>
</div>
</div>
</div>


@section('js_venta_page')

<script>
$(document).ready(function() {
$('#dataTable25').DataTable({
  dom: '<"top"i>rt<"bottom"flp><"clear">',
  "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
            }
});
});
</script>

@endsection
@endsection