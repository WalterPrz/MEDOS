@extends('admin.layouts.index')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12"></div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card card-post" id="post_card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        Creando usuario: 
                        <div class="pull-right">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm float-right" data-toggle="tooltip" data-placement="left" title data-original-title="Regresar a lista de usuarios">Regresar</a>
                        </div>
                    </div>
                </div>
                <form method="POST" action="/user" enctype="multipart/form-data" class="mb-0 needs-validation" role="form">
                {{ csrf_field() }}
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group has-feedback row">
                                    <label for="name" class="col-12 control-label">Nombre de usuario:</label>
                                    <div class="col-12">
                                        <input type="text" name="name" class="form-control" id="name" placeholder="Nombre" value="{{ old('name') }}" required>
                                    </div>
                                    @error('name')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group has-feedback row">
                                    <label for="email" class="col-12 control-label">Correo:</label>
                                    <div class="col-12">
                                        <input type="email" name="email" class="form-control" id="email" placeholder="Correo" value="{{ old('email') }}">
                                    </div>
                                    @error('email')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group has-feedback row">
                                    <label for="nombres" class="col-12 control-label">Nombres:</label>
                                    <div class="col-12">
                                        <input type="text" name="nombres" class="form-control" id="nombres" placeholder="Nombres del usuario" value="{{ old('nombres') }}" required>
                                    </div>
                                    @error('nombres')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group has-feedback row">
                                    <label for="apellidos" class="col-12 control-label">Apellidos:</label>
                                    <div class="col-12">
                                        <input type="text" name="apellidos" class="form-control" id="apellidos" placeholder="Apellidos del usuario" value="{{ old('apellidos') }}" required>
                                    </div>
                                    @error('apellidos')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group has-feedback row">
                                    <label for="cargo" class="col-12 control-label">Cargo:</label>
                                    <div class="col-12">
                                        <input type="text" name="cargo" class="form-control" id="cargo" placeholder="Cargo del usuario" value="{{ old('cargo') }}" required>
                                    </div>

                                    @error('cargo')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group has-feedback row">
                                    <label for="password" class="col-12 control-label">Contraseña:</label>
                                    <div class="col-12">
                                        <input type="password" name="password" class="form-control" id="password" placeholder="Contraseña" minlength="8">
                                    </div>
                                    @error('password')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="form-group has-feedback row">
                                    <label for="password_confirmation" class="col-12 control-label">Confirmar contraseña:</label>
                                    <div class="col-12">
                                        <input type="password" name="password_confirmation" class="form-control" placeholder="Confirmar contraseña" id="password_confirmation">
                                    </div>
                                    @error('password_confirmation')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-12 col-md-4">
                                <div class="form-group has-feedback row">
                                    <label for="role">Seleccionar rol</label>
                                    <select class="role form-control" name="role" id="role">
                                        <option value="">Seleccione un rol</option>
                                        @foreach ($roles as $role)

                                        @if (old('role')==$role->id)
                                        <option selected data-role-id="{{$role->id}}" data-role-slug="{{$role->slug}}" value="{{$role->id}}">{{$role->name}}</option>
                                        @else
                                        <option data-role-id="{{$role->id}}" data-role-slug="{{$role->slug}}" value="{{$role->id}}">{{$role->name}}</option>
                                        @endif
                                        @endforeach
                                    </select>

                                    @error('role')
                                    <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div id="permissions_box" >
                                    <label for="roles">Permisos que tiene el rol</label>
                                    <div id="permissions_ckeckbox_list">
                                    
                                    </div>
                                </div>     
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <span data-toggle="tooltip" title data-original-title="Guardar cambios realizados">
                                    <button type="submit" class="btn btn-success btn-lg btn-block" value="Guardar" name="action">
                                    <i class="fa fa-save fa-fw">
                                        <span class="sr-only">
                                            Guardar Usuario Icono
                                        </span>
                                    </i>
                                    Guardar usuario
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>


@section('js_user_page')

<script>
    $(document).ready(function(){
        var permissions_box = $('#permissions_box');
        var permissions_ckeckbox_list = $('#permissions_ckeckbox_list');
        permissions_box.hide(); // hide all boxes
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