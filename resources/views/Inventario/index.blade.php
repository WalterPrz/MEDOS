@extends('admin.layouts.index')
@section('title','Inventario')
@section('content')
<div>
    <h1>Inventario</h1>
    <div class="container-fluid">
        <form class="d-flex" role="search">
        <input name="buscarpor" class="form-control me-2" type="search" placeholder="Buscar por nombre medicamento" aria-label="Buscar">
        <button class="btn btn-outline-success" type="submit">Buscar</button>
        </form>
    </div>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">Nombre comercial medicamento</th>
            <th scope="col">Presentacion medicamento</th>
            <th scope="col">Cantidad disponible</th>
          </tr>
        </thead>
        <tbody>
            @foreach($inventarios as $item)
                <tr>
                <td scope="row">{{$item->nombre_comercial}}</td>
                <td>{{$item->presentacion}}</td>
                <td>{{$item->stock}}</td>
                </tr>
          @endforeach
        </tbody>
      </table>
</div>
@endsection
