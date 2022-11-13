@extends('admin.layouts.index')

@section('content')
<div class="row">
  <div class="col-sm-3 mb-4 d-flex">
    <div class="card card-post" id="post_card">
      <div class="card-header">
        <div style="display: flex; justify-content: space-between; align-items: center;">
          Detalle del ingreso
          <div class="pull-right">
            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm float-right" data-toggle="tooltip" data-placement="left" title data-original-title="Regresar a lista de expedientes">Regresar</a>
          </div>
        </div>
      </div>
      <form action="{{ route('detalleingreso.store', ['ingreso'=>$ingreso->id, 'credit'=>$credit->id]) }}" method='POST' class="needs-validation">
        @csrf
        <div class="card-body">
          <div class="row">
            <div class="col-md-12">
              <div class="form-group has-feedback row">
                <label for="medicamento" class="col-12 control-label">Seleccionar medicamento:</label>
                <div class="col-12">
                  <select class="medicamento form-control" name="medicamento" id="medicamento">
                    <option selected disabled='disabled'>Seleccionar medicamento</option>
                    @foreach( $medicamentos as $item )
                    @if (old('medicamento')==$item->id)
                    <option value="{{$item->id}}" selected>{{$item->nombre_comercial}}</option>
                    @else
                    <option value="{{$item->id}}">{{ $item->nombre_comercial }}</option>
                    @endif
                    @endforeach
                  </select>
                  @error('medicamento')
                  <div class="text-danger">{{ $message }}</div>
                  @enderror
                </div>
              </div>
              <div class="form-group has-feedback row">
                <label for="cantidadIngreso" class="col-12 control-label">Cantidad ingresada:</label>
                <div class="col-12">
                  <input id='cantidadIngreso' type='number' value="{{old('cantidadIngreso')}}" min='1' class='form-control' name='cantidadIngreso' placeholder='Cantidad ingresada'>
                </div>
                @error('cantidadIngreso')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group has-feedback row">
                <label for="precioCompra" class="col-12 control-label">Precio de compra:</label>
                <div class="col-12">
                  <input id='precioCompra' type='number' min='0.01' value="{{old('precioCompra')}}" step='0.01' class='form-control' name='precioCompra' placeholder='Precio de la compra'>
                </div>

                @error('precioCompra')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group has-feedback row">
                <label for="descuentoIngreso" class="col-12 control-label">Descuento:</label>
                <div class="col-12">
                  <input id='descuentoIngreso' type='text' value="{{old('descuentoIngreso')}}" class='form-control' name='descuentoIngreso' placeholder='Descuento'>
                </div>
                @error('descuentoIngreso')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group has-feedback row">
                <label for="fechaVenc" class="col-12 control-label">Fecha de vencimiento:</label>
                <div class="col-12">
                  <input id='fechaVenc' value="{{old('fechaVenc')}}" type='date' min="{{ date('Y-m-d') }}" class='form-control' name='fechaVenc' placeholder='Fecha de vencimiento'>
                </div>

                @error('fechaVenc')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group has-feedback row">
                <label for="precioCompraUnidad" class="col-12 control-label">Precio de compra por unidad:</label>
                <div class="col-12">
                  <input id='precioCompraUnidad' value="{{old('precioCompraUnidad')}}" type='number' min='0.01' step='0.01' class='form-control' name='precioCompraUnidad' placeholder='Precio de compra por unidad'>
                </div>

                @error('precioCompraUnidad')
                <div class="text-danger">{{ $message }}</div>
                @enderror
              </div>
              <div class="form-group has-feedback row">
                <label for="precioVentaUnidad" class="col-12 control-label">Precio de venta:</label>
                <div class="col-12">
                  <input id='precioVentaUnidad' value="{{old('precioVentaUnidad')}}" type='number' min='0.01' step='0.01' class='form-control' name='precioVentaUnidad' placeholder='Precio de venta'>
                </div>
                @error('precioVentaUnidad')
                <div class="text-danger">{{ $message }}</div>
                @enderror
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
        <a href="{{ route('ingresomed.create') }}" class="btn btn-info float-md-right">Finalizar</a>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered" id="dataTable7" width="100%" cellspacing="0">
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
            <tfoot>
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
                  <a href="{{route('detalleingreso.edit', ['ingreso'=>$ingreso->id, 'detalleIngreso'=>$itemDet, 'credit'=>$credit]) }}"><i class="fa fa-edit"></i></a>
                  <a href="{{route('detalleingreso.destroy', ['ingreso'=>$ingreso->id, 'detalleIngreso'=>$itemDet, 'credit'=>$credit]) }}" data-toggle="modal" data-target="#deleteModal" data-ingresoid="{{$ingreso->id}}" data-detalleid="{{$itemDet->id}}" data-creditid="{{$credit->id}}"><i class="fas fa-trash-alt"></i></a>
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

<!-- delete Modal-->
<div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro de que quieres eliminar esto?
        </h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">×</span>
        </button>
      </div>
      <div class="modal-body">Seleccione "eliminar" Si realmente desea eliminar a este ingreso
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
        <form method="POST" action="">
          @method('GET')
          @csrf
          <!--{{-- <input type="hidden" id="user_id" name="user_id" value=""> --}}-->
          <a class="btn btn-primary" onclick="$(this).closest('form').submit();">Borrar</a>
        </form>
      </div>
    </div>
  </div>
</div>
</div>
<div class="card-footer small text-muted"></div>
</div>
@section('js_venta_page')

<script>
  $('#deleteModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget)
    var ingreso_id = button.data('ingresoid')
    var detalle_id = button.data('detalleid')
    var credito_id = button.data('creditid')

    var modal = $(this)
    // modal.find('.modal-footer #user_id').val(user_id)
    modal.find('form').attr('action', '/ingresomed/detalle/destroy/' + ingreso_id + '/' + detalle_id + '/' + credito_id);
  })
</script>
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