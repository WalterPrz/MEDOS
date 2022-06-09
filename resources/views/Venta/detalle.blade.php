@extends('layouts.plantilla')
@section('title','Ventas')
@section('content')
<div>
    <h1>Detalle de la Venta</h1>
   
    <h3>Ingresa los medicamentos</h3>
    <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Nombre Comercial</th>
            <th scope="col">Precio Venta</th>
            <th scope="col">Agregar</th>
          </tr>
        </thead>
        <tbody>
            @foreach($medicamentos as $item)
                <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->nombre}}</td>
                <td>{{$item->nombre_comercial}}</td>
                <td>{{$item->precio_venta}}</td>
                <td>
                    <form action="{{route('detalleventa.store',['venta'=>$venta->id,'medicamento'=>$item->id])}}" method="POST">
                        @csrf
                        <button type="submit" class="btn btn-success">Agregar</button>
                    </form> 
                </td>
                </tr>
          @endforeach
        </tbody>
      </table>
      <h3>Medicamentos ingresados en la venta</h3>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Medicamento</th>
            <th scope="col">Precio Unitario</th>
            <th scope="col">Cantidad Venta</th>
            <th scope="col">SubTotal</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach($detalle_venta as $item)
                <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->medicamento->nombre}}</td>
                <td>{{$item->medicamento->precio_venta}}</td>
                <td>{{$item->cantidad_venta}}</td>
                <td>{{$item->cantidad_venta*$item->medicamento->precio_venta}}</td>
                <td>{{$item->precio_venta}}</td>
                <td>
                    <a href="{{route('categoria.show',$item->id)}}" class="btn btn-info" >Editar</a>
                    <a href="{{route('categoria.destroy',$item)}}" class="btn btn-danger" >Eliminar</a>
                </td>
                </tr>
          @endforeach
        </tbody>
      </table>
</div>
@endsection