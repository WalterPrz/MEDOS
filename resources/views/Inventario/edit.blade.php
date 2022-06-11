@extends('layouts.plantilla')
@section('title','Categorías')
@section('content')
<div>
    <h1>Editar Proveedor</h1>
    <form action="{{route('proveedor.update',$proveedor)}}" method="POST">
        @csrf
        @method('put')
        <div class="form-row">
        <div class="col-md-4">
            <label for="nombreProveedor">Nombre proveedor</label>
            <input  value="{{$proveedor->nombreProveedor}}" id="nombreProveedor" type="text" class="form-control" name="nombreProveedor" placeholder="Nombre de el proveedor">
          </div>
          <div class="col-md-4">
            <label for="telefonoProveedor">Teléfono proveedor</label>
            <input value="{{$proveedor->telefonoProveedor}}" id="telefonoProveedor" type="tel" class="form-control" name="telefonoProveedor" placeholder="(Código de área) Número">
          </div>
          <div class="col-md-4">
            <label for="nombreVendedor">Nombre vendedor encargado</label>
            <input value="{{$proveedor->nombreVendedor}}" id="nombreVendedor" type="text" class="form-control" name="nombreVendedor" placeholder="Nombre de el vendedor">
          </div>
          <div class="col-md-4">
            <label for="telefonoVendedor">Teléfono vendedor encargado</label>
            <input  value="{{$proveedor->telefonoVendedor}}" id="telefonoVendedor" type="tel" class="form-control" name="telefonoVendedor" placeholder="(Código de área) Número">
          </div>
          <div class="col-md-4">
            <label for="plazoDevolucion">Plazo de devolución (días)</label>
            <input value="{{$proveedor->plazoDevolucion}}" id="plazoDevolucion" type="number" class="form-control" name="plazoDevolucion" placeholder="Plazo de devolución en dias">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Modificar</button>
      </form>
</div>
@endsection
