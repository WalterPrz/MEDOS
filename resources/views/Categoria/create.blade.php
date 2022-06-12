@extends('admin.layouts.index')
@section('title', 'Categorías')
@section('content')
    <div>
        <h1>Crear Categorias</h1>
        <form action="{{ route('categoria.store') }}" method="POST">
            @csrf
            <div class="form-row">
                <div class="col-md-4">
                    <label for="nombre">Nombre</label>
                    <input id="nombre" type="text" class="form-control" name="nombre" placeholder="Nombre de la categoría">
                </div>
                <div class="col-md-4">
                    <label for="descripcion">Descripcion</label>
                    <textarea name="descripcion" class="form-control" id="descripcion" rows="3"></textarea>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Agregar</button>
        </form>
    </div>
@endsection
