@extends('admin.layouts.index')

@section('content')

<div class="container">       
    <div class="card">
        <div class="card-header">
            <h3>Nombre de usuario: {{$user->name}}</h3>  
            <h4>Correo: {{$user->email}}</h4>
            <h5>Nombres: {{$user->nombres}}</h5>
            <h5>Apellidos: {{$user->apellidos}}</h5>
            <h5>Cargo: {{$user->cargo}}</h5>
        </div>
        <div class="card-body">
            <h5 class="card-title">Roles</h5>
            <p class="card-text">
                @if ($user->roles->isNotEmpty())
                    @foreach ($user->roles as $role)
                        <span class="badge badge-primary">
                            {{ $role->name }}
                        </span>
                    @endforeach
                @endif
            </p>
            <h5 class="card-title">Permisos</h5>
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
        <div class="card-footer">
            <a href="{{ url()->previous() }}" class="btn btn-primary">Regresar</a>
        </div>
    </div>
</div>
    
@endsection