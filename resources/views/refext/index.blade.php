@extends('admin.layouts.index')
@section('title','Referencias externas')
@section('content')
<div class="row py-lg-2">
    <div class="col-md-6">
       <h2>Agregar referencias externas</h2>
    </div>

</div>
<div>

<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Tabla de expedientes</div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable21" width="100%" cellspacing="0">
            <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Fecha Apertura</th>
            <th scope="col">Nombre paciente</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tfoot>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Fecha Apertura</th>
            <th scope="col">Nombre paciente</th>
            <th scope="col">Opciones</th>
          </tr>
        </tfoot>
        <tbody>
            @foreach($expedientes as $item)
                <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->fechaApertura}}</td>
                <td>{{$item->nombrePaciente}}</td>
                <td>
                    <a href="{{route('refext.create',$item->id)}}" ><i class="fa fa-eye"></i></a>
                </td>
                </tr>
          @endforeach
        </tbody>
      </table>
</div>

</div>

@section('js_user_page')

    <script>
        $(document).ready(function() {
            $('#dataTable21').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
        });
    </script>
@endsection
@endsection

