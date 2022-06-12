@extends('admin.layouts.index')
@section('title','Inventario')
@section('content')
<div class="row py-lg-2">
    <div class="col-md-6">
       <h2>Inventario</h2>
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
            <th scope="col">Nombre comercial medicamento</th>
            <th scope="col">Presentacion medicamento</th>
            <th scope="col">Cantidad disponible</th>
          </tr>
        </thead>
        <tfoot>
        <tr>
            <th scope="col">Nombre comercial medicamento</th>
            <th scope="col">Presentacion medicamento</th>
            <th scope="col">Cantidad disponible</th>
          </tr>
        </tfoot>
        <tbody>
            @foreach($inventarios as $item)
                <tr>
                <td scope="row">{{$item->nombre_comercial}}</td>
                <td>{{$item->presentacion}}</td>
                <td>{{$item->stock}}</td>
                </tr>
          @endforeach
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
