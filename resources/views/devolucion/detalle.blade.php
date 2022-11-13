@extends('admin.layouts.index')
@section('title','Devoluciones')
@section('content')
    <div>
        <h1>Detalle de la Devolucion</h1>
        @if ($devolucion->estado ==0)
            <div class="row">
                <div class="col-sm-6"  style="height:40rem;overflow-y: scroll;">
                    <h3>Ingresa los medicamentos</h3>
                    <form action="" method="GET">
                        
                        <div class="row">
                            <div class="col-sm-8">
                                <input  class="form-control" type="text"  name="nombre_comercial" placeholder="Nombre de medicamento">
                            </div>
                            <div class="col-sm-4">
                                <button type="submit" class="btn btn-success">Filtrar</button>
                            </div>
                        </div>
                    </form>
                    <div class="table-responsive" style="margin-top:1em">
                    <table class="table table-bordered" id="dataTable13" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">Medicamento</th>
                                    <th scope="col">Fecha Vencimiento</th>
                                    <th scope="col">Fecha Ingreso</th>
                                    <th scope="col">Cantidad</th>
                                    <th scope="col">Proveedor</th>
                                    <th scope="col">Agregar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($filtered as $item)
                                <tr>
                                    <th>{{ $item->medicamento->nombre_comercial }}</th>
                                    <td>{{ $item->fechaVenc }}</td>
                                    <td>{{ $item->ingresoMedicamento->fechaIngreso }}</td>
                                    <td>{{ $item->cantidad }}</td>
                                    <td>{{ $item->ingresoMedicamento->credito->proveedor->nombreProveedor }}</td>
                                    <td>
                                    <form
                                        action="{{ route('detalledevolucion.store', ['devolucion' => $devolucion->id, 'id_detalle_ingreso' => $item->id]) }}"
                                        method="POST">
                                        @csrf
                                        <input hidden type="text" value="{{ old('cantidad',$item->cantidad) }}"
                                                    name="cantidad" class="form-control" placeholder="Cantidad"
                                                    aria-label="Cantidad" aria-describedby="button-addon2">
                                        <button type="submit" class="btn btn-success">Agregar</button>
                                    </form>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="col-sm-6">
                    <h3>Medicamentos ingresados en la devolucion</h3>
                    <form action="{{ route('devolucion.update', ['devolucion' => $devolucion->id]) }}" method="POST">
                        @csrf
                        @method('put');
                        <button type="submit" class="btn btn-danger float-md-right" style="margin-bottom:1em">Completar Devolucion</button>
                    </form>
                    <div class="table-responsive" style="margin-top:1em">
                    <table class="table table-bordered" id="dataTable14" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">Medicamento</th>
                                <th scope="col">Fecha Vencimiento</th>
                                <th scope="col">Fecha Ingreso</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Proveedor</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach ($detalle_dev as $item)
                                <tr>
                                    <td>{{ $item->detalleIngreso->medicamento->nombre_comercial }}</td>
                                    <td>{{ $item->detalleIngreso->fechaVenc }}</td>
                                    <td>{{ $item->detalleIngreso->ingresoMedicamento->fechaIngreso }}</td>
                                    <td>{{ $item->cantidad }}</td>
                                    <td>{{ $item->detalleIngreso->ingresoMedicamento->credito->proveedor->nombreProveedor }}</td>
                                    <td>
                                        <form
                                        action="{{ route('detalledevolucion.update', ['devolucion' => $devolucion->id, 'detalle_dev' => $item->id]) }}"
                                        method="POST">
                                        @csrf
                                        @method('put')
                                        <button type="submit" class="btn btn-danger">Quitar</button>
                                    </form>                                    </td>
                                </tr>
                            @endforeach 
                            <tfoot>
                            </tfoot>
                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
        @else
            <div class="card mb-3">
                <div class="card-header">
                    <i class="fas fa-table"></i>
                    Medicamentos devueltos
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable12" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">Medicamento</th>
                                    <th scope="col">Fecha Vencimiento</th>
                                    <th scope="col">Fecha Ingreso</th>
                                    <th scope="col">Proveedor</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($detalle_dev as $item)
                                <tr>
                                    <td>{{ $item->detalleIngreso->medicamento->nombre_comercial }}</td>
                                    <td>{{ $item->detalleIngreso->fechaVenc }}</td>
                                    <td>{{ $item->detalleIngreso->ingresoMedicamento->fechaIngreso }}</td>
                                    <td>{{ $item->detalleIngreso->ingresoMedicamento->credito->proveedor->nombreProveedor }}</td>
                                </tr>
                            @endforeach 
                            <tfoot>
                            </tfoot>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        @endif
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
                <div class="modal-body">Seleccione "eliminar" Si realmente desea eliminar a este medicamento de la devolucion 
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
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var venta_id = button.data('ventaid') 
            var detalle_id = button.data('detalleid') 
            
            var modal = $(this)
            // modal.find('.modal-footer #user_id').val(user_id)
            modal.find('form').attr('action','/venta/detalle/' + venta_id + '/eliminar/' + detalle_id);
        })
    </script>
<script>
    $(document).ready(function() {
    $('#dataTable12').DataTable({
        "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
    });
    $('#dataTable13').DataTable({
        dom: '<"top"i>rt<"bottom"flp><"clear">',
        "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
    });
    $('#dataTable14').DataTable({
        dom: '<"top"i>rt<"bottom"flp><"clear">',
        "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
    });
});
</script>

@endsection

@endsection
