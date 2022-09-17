@extends('admin.layouts.index')
@section('title','Visitas medicas')
@section('content')
<div class="row py-lg-2">
    <div class="col-md-6">
       <h2>Lista de visitas de pacientes</h2>
    </div>
</div>
<div>
<div class="container-fluid">
            <form  role="search">
            <div style="display: flex; align-items: flex-start; margin-top: 1em;">
                        <div class="col-sm-6">
                            <input  class="form-control float-md-right" type="date" id="start" name="fechaDiagnostico" min="2022-01-01">
                        </div>
                        <div class="col-sm-1">
                            <button type="submit" class="btn btn-success">Filtrar</button>
                        </div>
                    </div>
            </form>
         </div>
         <div>.</div>
</div>
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Tabla de visitas de pacientes</div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable21" width="100%" cellspacing="0">
            <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Fecha visita</th>
            <th scope="col">Nombre paciente</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tfoot>
        <tr>
        <th scope="col">id</th>
            <th scope="col">Fecha visita</th>
            <th scope="col">Nombre paciente</th>
            <th scope="col">Opciones</th>
          </tr>
        </tfoot>
        <tbody>
            @foreach($visitas as $item)
                <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->fechaDiagnostico}}</td>
                <td>{{$item->nombrePaciente}}</td>
                <td>
                    <a href="{{route('diagnostico.show',$item->id)}}" ><i class="fa fa fa-eye"></i></a>
                </td>
                </tr>
          @endforeach
        </tbody>
      </table>
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

