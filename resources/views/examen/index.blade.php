@extends('admin.layouts.index')

@section('content')

<div class="row py-lg-2">
  <div class="col-md-6">
       <h2>Lista de examenes del paciente: {{$nombrePaciente}}</h2>
  </div>
  <div class="col-md-6">
    <a href="/examen/paciente/{{$idPaciente}}/create" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Agregar Examen</a>
  </div>
</div>


<div>
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Tabla de examenes</div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable6" width="100%" cellspacing="0">
            <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Fecha</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tfoot>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Nombre</th>
              <th scope="col">Fecha</th>
              <th scope="col">Opciones</th>
            </tr>
         </tfoot>
        <tbody>
            @foreach($examenes as $item)
                <tr>
                <th scope="row">{{$item->id}}</th>
                <td>
                    @if($item->detaExa)
                        {{$item->detaExa->nombreExamen}}
                        {{$idTipoExamen = $item->detaExa->id}}
                    @elseif($item->detaHeces )
                        {{'HECES'}}
                        {{$idTipoExamen = $item->detaHeces->id}}
                    @elseif($item->detaHemo )
                        {{'HEMOGRAMA'}}
                        {{$idTipoExamen = $item->detaHemo->id}}
                    @elseif($item->detaOrina )
                        {{'ORINA'}}
                        {{$idTipoExamen = $item->detaOrina->id}}
                    @elseif($item->detaSangui)
                        {{'SANGUINEO'}}
                        {{$idTipoExamen = $item->detaSangui->id}}
                    @endif
                </td>
                <td>{{$item->fecha}}</td>
                <td>
                    @if($item->detaSangui)
                        <a href="{{route('examen.detasangui',['expediente'=> $item->expediente_id, 'examen'=> $item, $idTipoExamen]  )}}"><i class="fa fa-edit"></i></a>
                    @elseif($item->detaHemo )
                        <a href="{{route('examen.detahemo',['expediente'=> $item->expediente_id, 'examen'=> $item, $idTipoExamen]  )}}"><i class="fa fa-edit"></i></a>
                    @elseif($item->detaHeces )
                        <a href="{{route('examen.detaheces',['expediente'=> $item->expediente_id, 'examen'=> $item, $idTipoExamen]  )}}"><i class="fa fa-edit"></i></a>
                    @elseif($item->detaOrina )
                        <a href="{{route('examen.detaorina',['expediente'=> $item->expediente_id, 'examen'=> $item, $idTipoExamen]  )}}"><i class="fa fa-edit"></i></a>
                    @endif
                    <a href="{{route('examen.delete',['expediente'=> $item->expediente_id, 'examen'=> $item] )}}" data-toggle="modal" data-target="#deleteModal" data-categoriaid="{{$item->id}}"  data-expedienteid="{{$item->expediente_id}}"><i class="fas fa-trash-alt"></i></a>
                </td>
                </tr>
          @endforeach
        </tbody>
      </table>
</div>
 <!-- delete Modal-->
 <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro de que quieres eliminar esto?
</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">Seleccione "eliminar" Si realmente desea eliminar a este examen
</div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <form method="POST" action="">
                    @method('GET')
                    @csrf
                    <!--{{-- <input type="hidden" id="user_id" name="user_id" value=""> --}}-->
                    <a class="btn btn-primary" onclick="$(this).closest('form').submit();">Borrar</a>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="card-footer small text-muted"></div>
</div>

@section('js_user_page')

    <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var categoria_id = button.data('categoriaid') 
            const expedienteid =  button.data('expedienteid') 
            var modal = $(this)
            modal.find('form').attr('action','/examen/paciente/'+ expedienteid +'/' + categoria_id + '/destroy');
        })
    </script>
      <script>
        $(document).ready(function() {
            $('#dataTable6').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
        });
    </script>
@endsection

@endsection