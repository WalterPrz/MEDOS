@extends('admin.layouts.index')

@section('content')

<div class="row py-lg-2">
    <div class="col-md-6">
       <h2>Lista de usuarios</h2>
    </div>
    <div class="col-md-6">
        <a href="/user/create" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Nuevo usuario</a>
    </div>
</div>


<!-- DataTables Example -->
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Tabla de usuarios</div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable5" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th>Id</th>
                <th>Nombre de usuario</th>
                <th>Correo</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Cargo</th>
                <th>Rol</th>
                <th>Permisos</th>
                <th>Opciones</th>
            </tr>
            </thead>
            <tfoot>
            <tr>
                <th>Id</th>
                <th>Nombre de usuario</th>
                <th>Correo</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Cargo</th>
                <th>Rol</th>
                <th>Permisos</th>
                <th>Opciones</th>
            </tr>
            </tfoot>
            <tbody>
                @foreach ($users as $user)     
                @if(!\Auth::user()->hasRole('admin') && $user->hasRole('admin')) @continue; @endif       
                <tr {{ Auth::user()->id == $user->id ? 'bgcolor=#FFCE30' : '' }}>
                    <td>{{$user['id']}}</td>
                    <td>{{$user['name']}}</td>
                    <td>{{$user['email']}}</td>
                    <td>{{$user['nombres']}}</td>
                    <td>{{$user['apellidos']}}</td>
                    <td>{{$user['cargo']}}</td>
                    <td>
                        @if ($user->roles->isNotEmpty())
                            @foreach ($user->roles as $role)
                                <span class="badge badge-secondary">
                                    {{ $role->name }}
                                </span>
                            @endforeach
                        @endif
                    </td>
                    <td>
                        @if ($user->getPermissions()->isNotEmpty())
                                        
                            @foreach ($user->getPermissions() as $permission)
                                <span class="badge badge-secondary">
                                    {{ $permission->name }}                                    
                                </span>
                            @endforeach
                        
                        @endif
                    </td>
                    <td>
                        <a href="/user/{{ $user['id'] }}"><i class="fa fa-eye"></i></a>
                        <a href="/user/{{ $user['id'] }}/edit"><i class="fa fa-edit"></i></a>
                        <a href="#" data-toggle="modal" data-target="#deleteModal" data-userid="{{$user['id']}}"><i class="fas fa-trash-alt"></i></a>
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
                <div class="modal-body">Seleccione "eliminar" Si realmente desea eliminar a esta usuario
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
            var user_id = button.data('userid') 
            
            var modal = $(this)
            // modal.find('.modal-footer #user_id').val(user_id)
            modal.find('form').attr('action','/user/' + user_id);
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#dataTable5').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
        });
    </script>
@endsection

@endsection