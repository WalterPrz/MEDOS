@extends('admin.layouts.index')
@section('title','Editar ingreso')
@section('content')
<div>
  <h1>Modificar detalle de ingreso</h1>
  <form action="{{ route('detalleingreso.update', ['ingreso'=>$ingreso->id, 'detalleIngreso'=>$detalleIngreso->id]) }}" method='POST'>
    @csrf

    <div class="form-row">
        <div id='campo1' class='col-md-5'>
        <label for='medicamento'>Medicamento</label>
        <select id='medicamento' name='medicamento' class='form-select'>
            <option disabled='disabled'>Seleccionar medicamento</option>
            @foreach( $medicamentos as $item )

                @if ($item->id == $detalleIngreso->medicamento->id)
                    <option selected='true' value="{{ $item->id }}">{{ $item->nombre_comercial }}</option>
                @else
                    <option value="{{ $item->id }}">{{ $item->nombre_comercial }}</option>
                @endif

            @endforeach
        </select>
        </div>

        <div id='campo2' class='col-md-5'>
        <label for='cantidadIngreso'>Cantidad ingresada</label>
        <input id='cantidadIngreso' type='number' min='1' class='form-control' name='cantidadIngreso' placeholder='Cantidad ingresada' value='{{ $detalleIngreso->cantidadIngreso }}'>
        </div>

        <div id='campo3' class='col-md-5'>
        <label for='precioCompra'>Precio de compra</label>
        <input id='precioCompra' type='number' min='0.01' step='0.01' class='form-control' name='precioCompra' placeholder='Precio de la compra' value='{{ $detalleIngreso->precioCompra }}'>
        </div>

        <div id='campo4' class='col-md-5'>
        <label for='descuentoIngreso'>Descuento</label>
        <input id='descuentoIngreso' type='text' class='form-control' name='descuentoIngreso' placeholder='Descuento' value='{{ $detalleIngreso->descuentoIngreso }}'>
        </div>

        <div id='campo5' class='col-md-5'>
        <label for='fechaVenc'>Fecha de vencimiento</label>
        <input id='fechaVenc' type='date' min="{{ date('Y-m-d') }}" class='form-control' name='fechaVenc' placeholder='Fecha de vencimiento' value='{{ $detalleIngreso->fechaVenc }}'>
        </div>

        <div id='campo6' class='col-md-5'>
        <label for='precioCompraUnidad'>Precio de compra por unidad</label>
        <input id='precioCompraUnidad' type='number' min='0.01' step='0.01' class='form-control' name='precioCompraUnidad' placeholder='Precio de compra por unidad' value='{{ $detalleIngreso->precioCompraUnidad }}'>
        </div>

        <div id='campo7' class='col-md-5'>
        <label for='precioVentaUnidad'>Precio de venta</label>
        <input id='precioVentaUnidad' type='number' min='0.01' step='0.01' class='form-control' name='precioVentaUnidad' placeholder='Precio de venta' value='{{ $detalleIngreso->precioVentaUnidad }}'>
        </div>

        <div  class='col-md-10'>
             <button type='submit' id='agregar' class='btn btn-primary'>Guardar</button>
        </div>
    </form>
    </div>
</div>

@endsection
