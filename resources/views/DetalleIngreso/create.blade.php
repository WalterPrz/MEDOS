@extends('layouts.plantilla')
@section('title','Ingresar medicamento')
@section('content')
<div>
  <h1>Detalle del ingreso</h1>
  <div id='campo1' class='col-md-4'>
        <label for='medicamento'>Medicamento</label>
          <select id='medicamento' name='medicamento[]' class='form-select'>
            <option selected='true' disabled='disabled'>Seleccionar medicamento</option>
            @foreach( $medicamentos as $item )
              <option value="{{ $item->id }}">{{ $item->nombre_comercial }}</option>
            @endforeach
          </select>
        </div>
  <form action="{{ route('detalleingreso.store', ['ingreso'=>$ingreso->id, 'medicamento'=>$item->id]) }}" method='POST'>
    @csrf
      <div id='formulario'>


        <div id='campo2' class='col-md-4'>
          <label for='cantidadIngreso'>Cantidad ingresada</label>
          <input id='cantidadIngreso' type='number' min='1' class='form-control' name='cantidadIngreso[]' placeholder='Cantidad ingresada'>
        </div>

        <div id='campo3' class='col-md-4'>
          <label for='precioCompra'>Precio de compra</label>
          <input id='precioCompra' type='number' min='0.01' step='0.01' class='form-control' name='precioCompra[]' placeholder='Nombre de la categoría'>
        </div>

        <div id='campo4' class='col-md-4'>
          <label for='descuentoIngreso'>Descuento</label>
          <input id='descuentoIngreso' type='text' class='form-control' name='descuentoIngreso[]' placeholder='Nombre de la categoría'>
        </div>

        <div id='campo5' class='col-md-4'>
          <label for='fechaVenc'>Fecha de vencimiento</label>
          <input id='fechaVenc' type='date' min="{{ date('Y-m-d') }}" class='form-control' name='fechaVenc[]' placeholder='Fecha de vencimiento'>
        </div>

        <div id='campo6' class='col-md-4'>
          <label for='precioCompraUnidad'>Precio de compra por unidad</label>
          <input id='precioCompraUnidad' type='number' min='0.01' step='0.01' class='form-control' name='precioCompraUnidad[]' placeholder='Precio de compra por unidad'>
        </div>

        <div id='campo7' class='col-md-4'>
          <label for='precioVentaUnidad'>Precio de venta</label>
          <input id='precioVentaUnidad' type='number' min='0.01' step='0.01' class='form-control' name='precioVentaUnidad[]' placeholder='Precio de venta'>
        </div>

      </div>

    </div>
  <button type='submit' id='agregar' class='btn btn-primary'>Agregar</button>
  </form>   
</div>

<h3>Medicamentos ingresados al ingreso</h3>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Medicamento</th>
            <th scope="col">cantidadIngreso</th>
            <th scope="col">precioCompra</th>
            <th scope="col">descuentoIngreso</th>
            <th scope="col">fechaVenc</th>
            <th scope="col">precioCompraUnidad</th>
            <th scope="col">precioVentaUnidad</th>
          </tr>
        </thead>
        <tbody>
            @foreach($detalleIngreso as $item)
                <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->medicamento->nombre_comercial}}</td>
                <td>{{$item->cantidadIngreso}}</td>
                <td>{{$item->precioCompra}}</td>
                <td>{{$item->descuentoIngreso}}</td>
                <td>{{$item->fechaVenc}}</td>
                <td>{{$item->precioCompraUnidad}}</td>
                <td>{{$item->precioVentaUnidad}}</td>
                <td>
                    <a href="{{route('categoria.show',$item->id)}}" class="btn btn-info" >Editar</a>
                    <a href="{{route('categoria.destroy',$item)}}" class="btn btn-danger" >Eliminar</a>
                </td>
                </tr>
          @endforeach
        </tbody>
      </table>
@endsection