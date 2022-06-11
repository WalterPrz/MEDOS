@extends('admin.layouts.index')
@section('title','Proveedores')
@section('content')
<div>
    <h1>Proveedor</h1>
    <a href="{{route('proveedor.create')}}" class="btn btn-success">Crear Proveedor</a>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Nombre proveedor</th>
            <th scope="col">Telefono proveedor</th>
            <th scope="col">Nombre encargado</th>
            <th scope="col">Telefono encargado</th>
            <th scope="col">Plazo devolución (días)</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach($proveedors as $item)
                <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->nombreProveedor}}</td>
                <td>{{$item->telefonoProveedor}}</td>
                <td>{{$item->nombreVendedor}}</td>
                <td>{{$item->telefonoVendedor}}</td>
                <td>{{$item->plazoDevolucion}}</td>
                <td>
                    <a href="{{route('proveedor.show',$item->id)}}" class="btn btn-info" >Editar</a>
                    <a href="{{route('proveedor.destroy',$item)}}" class="btn btn-danger" >Eliminar</a>
                </td>
                </tr>
          @endforeach
        </tbody>
      </table>
</div>
@endsection
