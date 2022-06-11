@extends('admin.layouts.index')
@section('title','Proveedores')
@section('content')
<div>
    <h1>Crear Proveedor</h1>
    <form action="{{route('proveedor.store')}}" method="POST">
        @csrf
        <div class="form-row">
          <div class="col-md-5">
            <label for="nombreProveedor">Nombre proveedor</label>
            <input id="nombreProveedor" type="text" class="form-control" name="nombreProveedor" placeholder="Nombre de el proveedor">
          </div>
          <div class="col-md-5">
            <label for="telefonoProveedor">Teléfono proveedor</label>
            <input id="telefonoProveedor" type="tel" class="form-control" name="telefonoProveedor" placeholder="(Código de área) Número">
          </div>
          <div class="col-md-5">
            <label for="nombreVendedor">Nombre vendedor encargado</label>
            <input id="nombreVendedor" type="text" class="form-control" name="nombreVendedor" placeholder="Nombre de el vendedor">
          </div>
          <div class="col-md-5">
            <label for="telefonoVendedor">Teléfono vendedor encargado</label>
            <input id="telefonoVendedor" type="tel" class="form-control" name="telefonoVendedor" placeholder="(Código de área) Número">
          </div>
          <div class="col-md-5">
            <label for="plazoDevolucion">Plazo de devolución (días)</label>
            <input id="plazoDevolucion" type="number" class="form-control" name="plazoDevolucion" placeholder="Plazo de devolución en dias">
          </div>
        </div>
        <button type="submit" class="btn btn-primary">Guardar</button>
      </form>
</div>
@endsection
