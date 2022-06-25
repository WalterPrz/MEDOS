@extends('admin.layouts.index')
@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="container">
      <div class="card card-post" id="post_card">
        <div class="card-header">
          <div style="display: flex; justify-content: space-between; align-items: center;">
            Editando ingrerso:
          </div>
        </div>
        <form action="{{ route('detalleingreso.update', ['ingreso'=>$ingreso->id, 'detalleIngreso'=>$detalleIngreso->id]) }}" method='POST'>
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group has-feedback row">
                  <label for="medicamento" class="col-12 control-label">Seleccionar medicamento:</label>
                  <div class="col-12">
                    <select class="medicamento form-control" name="medicamento" id="medicamento">
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
                </div>
                <div class="form-group has-feedback row">
                  <label for="cantidadIngreso" class="col-12 control-label">Cantidad ingresada:</label>
                  <div class="col-12">
                    <input id='cantidadIngreso' type='number' min='1' class='form-control' name='cantidadIngreso' placeholder='Cantidad ingresada' value='{{ $detalleIngreso->cantidadIngreso }}'>
                  </div>
                </div>
                <div class="form-group has-feedback row">
                  <label for="precioCompra" class="col-12 control-label">Precio de compra:</label>
                  <div class="col-12">
                    <input id='precioCompra' type='number' min='0.01' step='0.01' class='form-control' name='precioCompra' placeholder='Precio de la compra' value='{{ $detalleIngreso->precioCompra }}'>
                  </div>
                </div>
                <div class="form-group has-feedback row">
                  <label for="descuentoIngreso" class="col-12 control-label">Descuento:</label>
                  <div class="col-12">
                    <input id='descuentoIngreso' type='text' class='form-control' name='descuentoIngreso' placeholder='Descuento' value='{{ $detalleIngreso->descuentoIngreso }}'>
                  </div>
                </div>
              <div class="form-group has-feedback row">
                  <label for="fechaVenc" class="col-12 control-label">Fecha de vencimiento:</label>
                  <div class="col-12">
                    <input id='fechaVenc' type='date' min="{{ date('Y-m-d') }}" class='form-control' name='fechaVenc' placeholder='Fecha de vencimiento' value='{{ $detalleIngreso->fechaVenc }}'>
                  </div>
                </div>
                <div class="form-group has-feedback row">
                  <label for="precioCompraUnidad" class="col-12 control-label">Precio de compra por unidad:</label>
                  <div class="col-12">
                    <input id='precioCompraUnidad' type='number' min='0.01' step='0.01' class='form-control' name='precioCompraUnidad' placeholder='Precio de compra por unidad' value='{{ $detalleIngreso->precioCompraUnidad }}'>
                  </div>
                </div>
                <div class="form-group has-feedback row">
                  <label for="precioVentaUnidad" class="col-12 control-label">Precio de venta:</label>
                  <div class="col-12">
                    <input id='precioVentaUnidad' type='number' min='0.01' step='0.01' class='form-control' name='precioVentaUnidad' placeholder='Precio de venta' value='{{ $detalleIngreso->precioVentaUnidad }}'>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-md-6">
                <span data-toggle="tooltip" title data-original-title="Guardar">
                  <button type="submit" class="btn btn-success btn-lg btn-block" id="agregar" value="Guardar" name="action">
                    <i class="fa fa-save fa-fw">
                      <span class="sr-only">
                        Guardar Icono
                      </span>
                    </i>
                    Guardar 
                  </button>
                </span>
              </div>
            </div>
          </div>
        </form>
      </div>
<div>
@endsection
