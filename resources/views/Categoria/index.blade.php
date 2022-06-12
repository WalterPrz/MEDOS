@extends('admin.layouts.index')
@section('title', 'Categorías')
@section('content')
    <div>
        <h1>Categorias</h1>
        <a href="{{ route('categoria.create') }}" class="btn btn-success">Crear Categoría</a>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Descripción</th>
                    <th scope="col">Opciones</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($categorias as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->nombre }}</td>
                        <td>{{ $item->descripcion }}</td>
                        <td>
                            <a href="{{ route('categoria.show', $item->id) }}" class="btn btn-info">Editar</a>
                            <a href="{{ route('categoria.destroy', $item) }}" class="btn btn-danger">Eliminar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
