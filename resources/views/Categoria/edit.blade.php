@extends('layouts.plantilla')
@section('title','Categorías')
@section('content')
<div>
    <h1>Editar Categorias</h1>
    <form action="{{route('categoria.update',$categoria)}}" method="POST">
        @csrf
        @method('put')
        <p>{{$categoria}}</p>
        <div class="form-row">
          <div class="col-md-4">
            <label for="nombre">Nombre</label>
            <input value="{{$categoria->nombre}}" id="nombre" type="text" class="form-control" name="nombre" placeholder="Nombre de la categoría">
          </div>
          <div class="col-md-4">
            <label for="descripcion">Descripcion</label>
            <textarea name="descripcion" class="form-control" id="descripcion" rows="3">{{$categoria->descripcion}}</textarea>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
      </form>   
</div>
@endsection