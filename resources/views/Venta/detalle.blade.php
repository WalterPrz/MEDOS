@extends('admin.layouts.index')
@section('title', 'Ventas')
@section('content')
    <div>
        <h1>Detalle de la Venta</h1>
        @if ($venta->estado == false)
            <div class="row">
                <div class="col-sm-6"  style="height:40rem;overflow-y: scroll;">
                    <h3>Ingresa los medicamentos</h3>
                    <form action="{{ route('venta.detalle',$venta) }}" method="GET">

                        <div class="row">
                            <div class="col-sm-8">
                                <input  class="form-control" type="text"  name="nombre_comercial" placeholder="Nombre de medicamento">
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-success">Filtrar</button>
                            </div>
                        </div>
                    </form>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Precio Venta</th>
                                <th scope="col">Detalle</th>
                                <th scope="col">Agregar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($medicamentos as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->nombre_comercial }}</td>
                                    <td>{{ $item->precio_venta }}</td>
                                    <td>
                                        <li>{{ $item->presentacion }}</li>
                                        <li>{{ $item->componentes }}</li>
                                    </td>
                                    <td>
                                        <form
                                            action="{{ route('detalleventa.store', ['venta' => $venta->id, 'medicamento' => $item->id]) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit" class="btn btn-success">Agregar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="col-sm-6">
                    <h3>Medicamentos ingresados en la venta</h3>
                    <form action="{{ route('venta.pagar', $venta) }}" method="POST">
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-danger">Completar Compra</button>
                    </form>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Medicamento</th>
                                <th scope="col">Precio Unitario</th>
                                <th scope="col">Cantidad Venta</th>
                                <th scope="col">SubTotal</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($detalle_venta as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->medicamento->nombre_comercial }}</td>
                                    <td>{{ $item->medicamento->precio_venta }}</td>
                                    <td>
                                        <form
                                            action="{{ route('detalleventa.update', ['venta' => $venta->id, 'detalleVenta' => $item->id]) }}"
                                            method="POST">
                                            @csrf
                                            @method('put')
                                            <div class="input-group mb-3">
                                                <input type="text" value="{{ $item->cantidad_venta }}"
                                                    name="cantidad_venta" class="form-control" placeholder="Cantidad"
                                                    aria-label="Cantidad" aria-describedby="button-addon2">
                                                <button class="btn btn-success" type="submit"
                                                    id="button-addon2">Actualizar</button>
                                            </div>
                                        </form>
                                    </td>
                                    <td>$
                                        {{ number_format($item->cantidad_venta * $item->medicamento->precio_venta, 2) }}
                                    </td>
                                    <td>
                                        <a href="{{ route('detalleventa.destroy', ['venta' => $venta, 'detalleVenta' => $item]) }}"
                                            class="btn btn-danger">Eliminar</a>
                                    </td>
                                </tr>
                            @endforeach
                            <tr>
                                <th></th>
                                <td></td>
                                <td></td>
                                <td>TOTAL</td>
                                <td>$ {{ $total }}</td>
                                <td></td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        @else
            <h3>Medicamentos de esta venta</h3>
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">id</th>
                        <th scope="col">Medicamento</th>
                        <th scope="col">Precio Unitario</th>
                        <th scope="col">Cantidad Venta</th>
                        <th scope="col">SubTotal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($detalle_venta as $item)
                        <tr>
                            <th scope="row">{{ $item->id }}</th>
                            <td>{{ $item->medicamento->nombre_comercial }}</td>
                            <td>{{ $item->medicamento->precio_venta }}</td>
                            <td>{{ $item->cantidad_venta }}</td>
                            <td>$ {{ number_format($item->cantidad_venta * $item->medicamento->precio_venta, 2) }}</td>
                        </tr>
                    @endforeach
                    <tr>
                        <th></th>
                        <td></td>
                        <td></td>
                        <td>TOTAL</td>
                        <td>$ {{ $total }}</td>
                    </tr>
                </tbody>
            </table>
        @endif
    </div>
@endsection
