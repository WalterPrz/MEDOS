@extends('admin.layouts.index')

@section('content')


    <div class="container">      
        <div class="row">
            <div class="col-sm-12"></div>
        </div> 
    </div>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-lg-10 offset-lg-1">
                <div class="card">
                    <div class="card-header">
                        <div style="display: flex; justify-content: space-between; align-items: center;">
                            <span id="card_title">
                                Mostrando usuario:
                            </span>
                            <div class="pull-right">
                                <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm float-right" data-toggle="tooltip" data-placement="left" title="Regresar a lista de usuarios">Regresar</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <ul class="list-group">
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Nombre de usuario:
                                <span >
                                    {{$user->name}}
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Correo
                                <span >
                                    {{$user->email}}
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Nombres:
                                <span >
                                    {{$user->nombres}}
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Apellidos:
                                <span >
                                    {{$user->apellidos}}
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Cargo: 
                                <span >
                                    {{$user->cargo}}
                                </span>
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Rol: 
                                @if ($user->roles->isNotEmpty())
                                @foreach ($user->roles as $role)
                                <span class="badge badge-primary">
                                    {{$role->name}}
                                </span>
                                @endforeach
                                @endif
                            </li>
                            <li class="list-group-item d-flex justify-content-between align-items-center">
                                Permisos: 
                                @if ($user->getPermissions()->isNotEmpty())                                        
                                @foreach ($user->getPermissions() as $permission)
                                <span class="badge badge-success">
                                    {{$permission->name}}
                                </span>
                                @endforeach            
                                @endif
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
@endsection