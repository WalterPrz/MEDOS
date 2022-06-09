@extends('layouts.plantilla')
@section('title','Ingresar medicamento')
@section('content')
<div>
    <h1>Ingresar medicamentos</h1>
    <form action="{{route('categoria.store')}}" method="POST">
        @csrf
        <div class="form-row">
          <div class="col-md-4">
            <label for="cantidadIngreso">Cantidad ingresada</label>
            <input id="cantidadIngreso" type="text" class="form-control" name="nombre" placeholder="Nombre de la categoría">
          </div>
          <div class="col-md-4">
            <label for="precioCompra">Precio de compra</label>
            <textarea name="precioCompra" class="form-control" id="descripcion" rows="3"></textarea>
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Agregar</button>
      </form>   
</div>
@endsection