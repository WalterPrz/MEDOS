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
  <div class="row">
    <div class="col-sm-3 mb-4 d-flex">
      <div class="card card-post" id="post_card">
        <div class="card-header">
          <div style="display: flex; justify-content: space-between; align-items: center;">
            Detalle del ingreso
          </div>
        </div>
        <form action="{{ route('detalleingreso.store', ['ingreso'=>$ingreso->id]) }}" method='POST'>
          @csrf
          <div class="card-body">
            <div class="row">
              <div class="col-md-12">
                <div class="form-group has-feedback row">
                  <label for="medicamento" class="col-12 control-label">Seleccionar medicamento:</label>
                  <div class="col-12">
                    <select class="medicamento form-control" name="medicamento" id="medicamento">
                      <option selected='true' disabled='disabled'>Seleccionar medicamento</option>
                      @foreach( $medicamentos as $item )
                      <option value="{{ $item->id }}">{{ $item->nombre_comercial }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>
                <div class="form-group has-feedback row">
                  <label for="cantidadIngreso" class="col-12 control-label">Cantidad ingresada:</label>
                  <div class="col-12">
                    <input id='cantidadIngreso' type='number' min='1' class='form-control' name='cantidadIngreso' placeholder='Cantidad ingresada'>
                  </div>
                </div>
                <div class="form-group has-feedback row">
                  <label for="precioCompra" class="col-12 control-label">Precio de compra:</label>
                  <div class="col-12">
                    <input id='precioCompra' type='number' min='0.01' step='0.01' class='form-control' name='precioCompra' placeholder='Precio de la compra'>
                  </div>
                </div>
                <div class="form-group has-feedback row">
                  <label for="descuentoIngreso" class="col-12 control-label">Descuento:</label>
                  <div class="col-12">
                    <input id='descuentoIngreso' type='text' class='form-control' name='descuentoIngreso' placeholder='Descuento'>
                  </div>
                </div>
              <div class="form-group has-feedback row">
                  <label for="fechaVenc" class="col-12 control-label">Fecha de vencimiento:</label>
                  <div class="col-12">
                    <input id='fechaVenc' type='date' min="{{ date('Y-m-d') }}" class='form-control' name='fechaVenc' placeholder='Fecha de vencimiento'>
                  </div>
                </div>
                <div class="form-group has-feedback row">
                  <label for="precioCompraUnidad" class="col-12 control-label">Precio de compra por unidad:</label>
                  <div class="col-12">
                    <input id='precioCompraUnidad' type='number' min='0.01' step='0.01' class='form-control' name='precioCompraUnidad' placeholder='Precio de compra por unidad'>
                  </div>
                </div>
                <div class="form-group has-feedback row">
                  <label for="precioVentaUnidad" class="col-12 control-label">Precio de venta:</label>
                  <div class="col-12">
                    <input id='precioVentaUnidad' type='number' min='0.01' step='0.01' class='form-control' name='precioVentaUnidad' placeholder='Precio de venta'>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="row">
              <div class="col-md-6">
                <span data-toggle="tooltip" title data-original-title="Guardar">
                  <button type="submit" class="btn btn-success btn-lg btn-block" id="guardar" value="Guardar" name="action">
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
    </div>
    <div class="col-sm-9 mb-4 d-flex">
<div class="card">
  <div class="card-header">
      <i class="fas fa-table"></i>
        Medicamentos entrantes
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable7"  width="100%" cellspacing="0">
          <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Medicamento</th>
            <th scope="col">Cantidad de ingreso</th>
            <th scope="col">Precio de compra</th>
            <th scope="col">Descuento de ingreso</th>
            <th scope="col">Fecha de vencimiento</th>
            <th scope="col">Precio de unidad comprada</th>
            <th scope="col">Precio de venta unidad</th>
            <th scope="col">Acciones</th>
          </tr>
        </thead>
        <tfoot>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Medicamento</th>
              <th scope="col">Cantidad de ingreso</th>
              <th scope="col">Precio de compra</th>
              <th scope="col">Descuento de ingreso</th>
              <th scope="col">Fecha de vencimiento</th>
              <th scope="col">Precio de unidad comprada</th>
              <th scope="col">Precio de venta unidad</th>
              <th scope="col">Acciones</th>
            </tr>
          </tfoot>
        <tbody>
            @foreach($detalleIngreso as $itemDet)
                <tr>
                <th scope="row">{{$itemDet->id}}</th>
                <td>{{$itemDet->medicamento->nombre_comercial}}</td>
                <td>{{$itemDet->cantidadIngreso}}</td>
                <td>{{$itemDet->precioCompra}}</td>
                <td>{{$itemDet->descuentoIngreso}}</td>
                <td>{{$itemDet->fechaVenc}}</td>
                <td>{{$itemDet->precioCompraUnidad}}</td>
                <td>{{$itemDet->precioVentaUnidad}}</td>
                <td>
                    <a href="{{route('detalleingreso.edit', ['ingreso'=>$ingreso->id, 'detalleIngreso'=>$itemDet]) }}" ><i class="fa fa-edit"></i></a>
                    <a href="{{route('detalleingreso.destroy', ['ingreso'=>$ingreso->id, 'detalleIngreso'=>$itemDet]) }}"><i class="fas fa-trash-alt"></i></a>
                </td>
                </tr>
          @endforeach
        </tbody>
      </table>
      </div>
  </div>
</div>
</div>
</div>
@section('js_venta_page')

    <script>
$(document).ready(function() {
    $('#dataTable7').DataTable({
      "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
    });
});
    </script>

@endsection
@endsection