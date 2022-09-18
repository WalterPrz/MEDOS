@extends('admin.layouts.index')
@section('title','Detalle expediente')
@section('content')
<div class="row py-lg-2">
    <div class="col-md-6">
       <h2>Detalle del expediente</h2>
    </div>
</div>
<div>
<div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable2" width="100%" cellspacing="0">
            <thead>
            <tr>
            <th scope="col">Numero expediente</th>
            <th scope="col">Fecha de apertura</th>
            <th scope="col">Nombre</th>
            <th scope="col">Edad</th>
            <th scope="col">Genero</th>
            <th scope="col">Teléfono</th>
            <th scope="col">Alergias</th>

          </tr>
        </thead>
        <tbody>
            @foreach($expedientes as $item)
                <tr>
                <td scope="row">{{$item->id}}</td>
                <td>{{$item->fecha}}</td>
                <td>{{$item->nombrePaciente}}</td>
                <td>{{$item->edadPaciente}}</td>
                <td>{{$item->genero}}</td>
                <td>{{$item->telefonoPaciente}}</td>
                <td>{{$item->alergias}}</td>
              </tr>
          @endforeach
        </tbody>
      </table>
</div>
</div>
<div class="list-group">
  <a href="#" class="col-md-6 list-group-item list-group-item-action active">
    <strong>Referencias/expedientes externos del paciente</strong>
  </a>
    @foreach($documentos as $item)
    <a class=" col-md-6 list-group-item list-group-item-action" href="{{ route('expediente.download', $item->id) }}">{{$item->nombreReferencia}}</a>
    @endforeach
</div>

<div class="row py-lg-2">
    <div class="col-md-6">
       <h3>Diagnósticos</h3>
    </div>
</div>
<div>
<div class="card-body">
        <div class="table-responsive">
        <table class="table fixed table-bordered" id="dataTable21" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th scope="col">Fecha consulta</th>
                <th scope="col">Peso</th>
                <th scope="col">Altura</th>
                <th scope="col">Diagnostico</th>
                <th scope="col">Receta</th>

          </tr>
        </thead>
        <tfoot>
        <tr>
            <th scope="col">Fecha consulta</th>
            <th scope="col">Peso</th>
            <th scope="col">Altura</th>
            <th scope="col">Diagnostico</th>
            <th scope="col">Receta</th>

          </tr>
        </tfoot>
        <tbody>
            @foreach($diagnosticos as $item)
                <tr>
                <td scope="row">{{$item->fecha}}</td>
                <td>{{$item->peso}}</td>
                <td>{{$item->altura}}</td>
                <td>{{$item->descripcionDiagnostico}}</td>
                <td >{{$item->descripcionReceta}}</td>

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

