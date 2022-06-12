@extends('admin.layouts.index')
@section('title','Ingresar medicamento')
@section('content')
<div>
  <h1>Detalle del ingreso</h1>
  <form action="{{ route('detalleingreso.store', ['ingreso'=>$ingreso->id]) }}" method='POST'>
    @csrf

    <div class="form-row">
        <div id='campo1' class='col-md-5'>
        <label for='medicamento'>Medicamento</label>
        <select id='medicamento' name='medicamento' class='form-select'>
            <option selected='true' disabled='disabled'>Seleccionar medicamento</option>
            @foreach( $medicamentos as $item )
                <option value="{{ $item->id }}">{{ $item->nombre_comercial }}</option>
            @endforeach
        </select>
        </div>

        <div id='campo2' class='col-md-5'>
        <label for='cantidadIngreso'>Cantidad ingresada</label>
        <input id='cantidadIngreso' type='number' min='1' class='form-control' name='cantidadIngreso' placeholder='Cantidad ingresada'>
        </div>

        <div id='campo3' class='col-md-5'>
        <label for='precioCompra'>Precio de compra</label>
        <input id='precioCompra' type='number' min='0.01' step='0.01' class='form-control' name='precioCompra' placeholder='Precio de la compra'>
        </div>

        <div id='campo4' class='col-md-5'>
        <label for='descuentoIngreso'>Descuento</label>
        <input id='descuentoIngreso' type='text' class='form-control' name='descuentoIngreso' placeholder='Descuento'>
        </div>

        <div id='campo5' class='col-md-5'>
        <label for='fechaVenc'>Fecha de vencimiento</label>
        <input id='fechaVenc' type='date' min="{{ date('Y-m-d') }}" class='form-control' name='fechaVenc' placeholder='Fecha de vencimiento'>
        </div>

        <div id='campo6' class='col-md-5'>
        <label for='precioCompraUnidad'>Precio de compra por unidad</label>
        <input id='precioCompraUnidad' type='number' min='0.01' step='0.01' class='form-control' name='precioCompraUnidad' placeholder='Precio de compra por unidad'>
        </div>

        <div id='campo7' class='col-md-5'>
        <label for='precioVentaUnidad'>Precio de venta</label>
        <input id='precioVentaUnidad' type='number' min='0.01' step='0.01' class='form-control' name='precioVentaUnidad' placeholder='Precio de venta'>
        </div>
        <div id='campo7' class='col-md-10'>
        <button type='submit' id='agregar' class='btn btn-primary'>Agregar</button>
        </div>
    </form>
    </div>
</div>

<h3>Medicamentos ingresados al ingreso</h3>
      <a href="{{ route('ingresomed.create') }}" class="btn btn-info">Finalizar</a>
      <table class="table">
        <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Medicamento</th>
            <th scope="col">cantidad</th>
            <th scope="col">Precio compra</th>
            <th scope="col">Descuento (%)</th>
            <th scope="col">Fecha vencimiento</th>
            <th scope="col">Precio Compra(u.)</th>
            <th scope="col">precio venta (u.)</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tbody>
            @foreach($detalleIngreso as $itemDet)
                <tr>
                <th scope="row">{{$itemDet->id}}</th>
                <td>{{$itemDet->medicamento->nombre}}</td>
                <td>{{$itemDet->cantidadIngreso}}</td>
                <td>{{$itemDet->precioCompra}}</td>
                <td>{{$itemDet->descuentoIngreso}}</td>
                <td>{{$itemDet->fechaVenc}}</td>
                <td>{{$itemDet->precioCompraUnidad}}</td>
                <td>{{$itemDet->precioVentaUnidad}}</td>
                <td>
                    <a href="{{route('detalleingreso.edit', ['ingreso'=>$ingreso->id, 'detalleIngreso'=>$itemDet]) }}" class="btn btn-info" >Editar</a>
                    <a href="{{route('detalleingreso.destroy', ['ingreso'=>$ingreso->id, 'detalleIngreso'=>$itemDet]) }}" class="btn btn-danger" >Eliminar</a>
                </td>
                </tr>
          @endforeach
        </tbody>
      </table>
@endsection
