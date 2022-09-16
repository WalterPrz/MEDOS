@extends('admin.layouts.index')

@section('content')

<div class="row py-lg-2">
    <div class="col-md-6">
       <h2>Lista de citas</h2>
    </div>
    <div class="col-md-6">
        <a href="/citas/create" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Nueva cita</a>
    </div>
</div>
<div>
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Tabla de de citas</div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTableCitas" width="100%" cellspacing="0">
            <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Registró</th>
            <th scope="col">Especialidad</th>
            <th scope="col">Paciente</th>
            <th scope="col">Fecha de cita</th>
            <th scope="col">Hora de cita</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Estado</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tfoot>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Registró</th>
            <th scope="col">Especialidad</th>
            <th scope="col">Paciente</th>
            <th scope="col">Fecha de cita</th>
            <th scope="col">Hora de cita</th>
            <th scope="col">Descripcion</th>
            <th scope="col">Estado</th>
            <th scope="col">Opciones</th>
          </tr>
        </tfoot>
        <tbody>
            @foreach($citas as $item)
                <tr>
                <th scope="row">{{$item->id}}</th>
                <td>
                    @if ($item->user->isNotEmpty())
                        <span class="badge badge-secondary">
                            {{user->name}}
                        </span>
                    @endif
                </td>
                <td>{{$item->especialidad}}</td>
                <td>{{$item->paciente}}</td>
                <td>{{$item->fecha_cita}}</td>
                <td>{{$item->hora_cita}}</td>
                <td>{{$item->descricpion}}</td>
                <td>{{$item->estado}}</td>
                
                <td>
                    <a href="/citas/{{ $citas['id'] }}"><i class="fa fa-eye"></i></a>
                    <a href="/citas/{{ $citas['id'] }}/edit"><i class="fa fa-edit"></i></a>
                    <a href="#" data-toggle="modal" data-target="#deleteModal" data-citaid="{{$citas['id']}}"><i class="fas fa-trash-alt"></i></a>
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
                <div class="modal-body">Seleccione "eliminar" Si realmente desea eliminar a esta cita
</div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <form method="POST" action="">
                    @method('DELETE')
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
            var cita_id = button.data('citaid') 
            
            var modal = $(this)
            // modal.find('.modal-footer #user_id').val(user_id)
            modal.find('form').attr('action','/citas/' + cita_id);
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#dataTableCitas').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
        });
    </script>
@endsection
@endsection
