@extends('admin.layouts.index')
@section('title','Devoluciones')
@section('content')
    <div>
        <h1>Detalle de la Devolucion</h1>
        @if (true)
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
                                    <th scope="col">id</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Fecha Vencimiento</th>
                                    <th scope="col">Fecha Ingreso</th>
                                    <th scope="col">Cantidad/th>
                                    <th scope="col">Agregar</th>
                                </tr>
                            </thead>
                            <tbody>
                                {{-- @foreach ($medicamentos as $item)
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
                            @endforeach --}}
                        </tbody>
                    </table>
                    </div>
                </div>
                <div class="col-sm-6">
                    <h3>Medicamentos ingresados en la devolucion</h3>
                    <form action="" method="POST">
                        @csrf
                        @method('put')
                        <button type="submit" class="btn btn-danger float-md-right" style="margin-bottom:1em">Completar Compra</button>
                    </form>
                    <div class="table-responsive" style="margin-top:1em">
                    <table class="table table-bordered" id="dataTable14" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th scope="col">id</th>
                                <th scope="col">Nombre</th>
                                <th scope="col">Fecha Vencimiento</th>
                                <th scope="col">Fecha Ingreso</th>
                                <th scope="col">Cantidad</th>
                                <th scope="col">Eliminar</th>
                            </tr>
                        </thead>
                        <tbody>
                            {{-- @foreach ($detalle_venta as $item)
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
                                                <input type="text" value="{{ old('cantidad_venta',$item->cantidad_venta) }}"
                                                    name="cantidad_venta" class="form-control" placeholder="Cantidad"
                                                    aria-label="Cantidad" aria-describedby="button-addon2">
                                                    @error('cantidad_venta')
                                                    <div class="text-danger">{{ $message }}</div>
                                                    @enderror
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
                                        data-toggle="modal" data-target="#deleteModal" data-ventaid="{{$venta->id}}" data-detalleid="{{$item->id}}"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach --}}
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <td></td>
                                    <td></td>
                                    <td><strong>TOTAL</strong</td>
                                    <td><strong>$ </strong></td>
                                    <td></td>
                                </tr>
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
                    Medicamentos de esta venta
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable12" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">Nombre</th>
                                    <th scope="col">Fecha Vencimiento</th>
                                    <th scope="col">Fecha Ingreso</th>
                                    <th scope="col">Cantidad</th>
                                </tr>
                            </thead>
                            <tbody>
                            {{-- @foreach ($detalle_venta as $item)
                                <tr>
                                    <th scope="row">{{ $item->id }}</th>
                                    <td>{{ $item->medicamento->nombre_comercial }}</td>
                                    <td>{{ $item->medicamento->precio_venta }}</td>
                                    <td>{{ $item->cantidad_venta }}</td>
                                    <td>$ {{ number_format($item->cantidad_venta * $item->medicamento->precio_venta, 2) }}</td>
                                </tr>
                            @endforeach --}}
                            <tfoot>
                                <tr>
                                    <th></th>
                                    <td></td>
                                    <td></td>
                                    <td><strong>TOTAL</strong></td>
                                    <td><strong>$ </strong></td>
                                    <td></td>
                                </tr>
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
