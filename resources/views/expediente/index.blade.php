@extends('admin.layouts.index')
@section('title','Visitas medicas')
@section('content')
<div class="row py-lg-2">
    <div class="col-md-6">
       <h2>Lista de expedientes</h2>
    </div>

    <div class="col-md-6">
        <a href="{{route('expediente.create')}}" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Crear expediente</a>
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
                    <a href="{{route('expediente.show',$item->id)}}" ><i class="fa fa fa-eye"></i></a>
                    <a href="{{route('expediente.edit',$item->id)}}" ><i class="fa fa fa-edit"></i></a>
                    <a href="{{route('expediente.destroy',$item)}}" data-toggle="modal" data-target="#deleteModal" data-expedienteid="{{$item->id}}"><i class="fas fa-trash-alt"></i></a>
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
                <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro que quieres eliminar esto?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Seleccione "eliminar" Si realmente desea eliminar este expediente</div>
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
<div class="card-footer small text-muted"></div>

</div>

@section('js_user_page')

<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var expediente_id = button.data('expedienteid') 
            
        var modal = $(this)
        // modal.find('.modal-footer #user_id').val(user_id)
        modal.find('form').attr('action','/expediente/' + expediente_id + '/destroy');
    })
</script>

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

