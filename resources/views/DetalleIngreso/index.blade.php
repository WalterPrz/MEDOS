@extends('admin.layouts.index')
@section('title', 'Compras')
@section('content')
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Detalle de compra
    </div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable20" width="100%" cellspacing="0">
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
            <tfoot>
                    <th scope="col">id</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Cantidad ingreso</th>
                    <th scope="col">Precio de compra ($)</th>
                    <th scope="col">Descuento (%)</th>
                    <th scope="col">Fecha de vencimiento</th>
                    <th scope="col">Precio de compra (unidad)</th>
                    <th scope="col">Precio de venta (unidad)</th>
            </tfoot>
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
        </div>


    </div>

    @section('js_venta_page')

    <script>
$(document).ready(function() {
    $('#dataTable20').DataTable({
      "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
    });
});
    </script>

@endsection
@endsection
