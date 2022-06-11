@extends('admin.layouts.index')
@section('title', 'Compras')
@section('content')
    <div>
        <h1>Detalle de compra</h1>
        <table class="table">
            <thead>
                <tr>
                    <th scope="col">id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cantidad ingreso</th>
                    <th scope="col">Precio de compra ($)</th>
                    <th scope="col">Descuento (%)</th>
                    <th scope="col">Fecha de vencimiento</th>
                    <th scope="col">Precio de compra (unidad)</th>
                    <th scope="col">Precio de venta (unidad)</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($detalle_ingreso as $item)
                    <tr>
                        <th scope="row">{{ $item->id }}</th>
                        <td>{{ $item->medicamento->nombre_comercial }}</td>
                        <td>{{ $item->cantidadIngreso }}</td>
                        <td>{{ $item->precioCompra }}</td>
                        <td>{{ $item->descuentoIngreso }}</td>
                        <td>{{ $item->fechaVenc }}</td>
                        <td>{{ $item->precioCompraUnidad }}</td>
                        <td>{{ $item->precioVentaUnidad }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>


    </div>
@endsection
