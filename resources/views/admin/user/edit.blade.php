@extends('admin.layouts.index')

@section('content')

<h2>Editar Usuario</h2>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<form method="POST" action="/user/{{ $user->id }}" enctype="multipart/form-data">
    @method('PATCH')
    @csrf()
    
    <div class="form-group">
        <label for="name">Nombre de usuario</label>
        <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" value="{{ $user->name }}" required>
    </div>
    <div class="form-group">
        <label for="email">Correo</label>
        <input type="email" name="email" class="form-control" id="email" placeholder="Correo" value="{{ $user->email }}">
    </div>
    <div class="form-group">
        <label for="name">Nombres</label>
        <input type="text" name="nombres" class="form-control" id="nombres" placeholder="Nombres del usuario" value="{{ $user->nombres }}" required>
    </div>
    <div class="form-group">
        <label for="name">Apellidos</label>
        <input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="Apellidos del usuario" value="{{ $user->apellidos }}" required>
    </div>
    <div class="form-group">
        <label for="name">Cargo</label>
        <input type="text" name="cargo" class="form-control" id="cargo" placeholder="Cargo del usuario" value="{{ $user->cargo }}" required>
    </div>
    <div class="form-group">
        <label for="password">Contraseña</label>
        <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña" minlength="8">
    </div>
    <div class="form-group">
        <label for="password_confirmation">Confirmar contraseña</label>
        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar contraseña" id="password_confirmation">
    </div>

    <div class="form-group">
        <label for="role">Seleccionar rol</label>

        <select class="role form-control" name="role" id="role">
            <option value="">Seleccione un rol</option>
            @foreach ($roles as $role)
            <option data-role-id="{{$role->id}}" data-role-slug="{{$role->slug}}" value="{{$role->id}}" {{ $user->roles->isEmpty() || $role->name != $userRole->name ? "" : "selected"}}>{{$role->name}}</option>                
            @endforeach
        </select>
    </div>

    <div id="permissions_box" >
        <label for="roles">Permisos que tiene el rol</label>
        <div id="permissions_ckeckbox_list">
        <p class="card-text">
                @if ($user->getPermissions()->isNotEmpty())                                        
                    @foreach ($user->getPermissions() as $permission)
                        <span class="badge badge-success">
                            {{ $permission->name }}                                    
                        </span>
                    @endforeach            
                @endif
            </p>
        </div>
    </div>     

    <div class="form-group pt-2">
        <input class="btn btn-primary" type="submit" value="Editar">
    </div>
</form>

@section('js_user_page')

<script>
    $(document).ready(function(){
        var permissions_box = $('#permissions_box');
        var permissions_ckeckbox_list = $('#permissions_ckeckbox_list');
        $('#role').on('change', function() {
            var role = $(this).find(':selected');    
            var role_id = role.data('role-id');
            var role_slug = role.data('role-slug');
            permissions_ckeckbox_list.empty();
            $.ajax({
                url: "/user/create",
                method: 'get',
                dataType: 'json',
                data: {
                    role_id: role_id,
                    role_slug: role_slug,
                }
            }).done(function(data) {
                
                console.log(data);
                
                permissions_box.show();                        
                // permissions_ckeckbox_list.empty();
                '<div class="card-body">'+
                '<p class="card-text">'+
                $.each(data, function(index, element){
                    $(permissions_ckeckbox_list).append(       
                        '<span class="badge badge-success">'+                         
                           element.name +
                        '</span>'
                    );
                });
                '</p>'+
                '</div>'
            });
        });
    });
</script>

@endsection

@endsection


