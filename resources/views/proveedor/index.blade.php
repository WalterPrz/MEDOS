@extends('admin.layouts.index')
@section('title','Proveedores')
@section('content')
<div class="row py-lg-2">
    <div class="col-md-6">
       <h2>Lista de proveedores</h2>
    </div>
    <div class="col-md-6">
        <a href="{{route('proveedor.create')}}" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Crear Proveedor</a>
    </div>
</div>
<div>
    @if ($existe)
    <script >
  
      Swal.fire(
      '¡Hay medicamentos próximos a vencer!',
      'Realiza las devoluciones',
      'warning'
      )
      </script>
    @endif
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Tabla de proveedores</div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable21" width="100%" cellspacing="0">
            <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Nombre proveedor</th>
            <th scope="col">Telefono proveedor</th>
            <th scope="col">Nombre encargado</th>
            <th scope="col">Telefono encargado</th>
            <th scope="col">Plazo devolución (días)</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tfoot>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Nombre proveedor</th>
            <th scope="col">Telefono proveedor</th>
            <th scope="col">Nombre encargado</th>
            <th scope="col">Telefono encargado</th>
            <th scope="col">Plazo devolución (días)</th>
            <th scope="col">Opciones</th>
          </tr>
        </tfoot>
        <tbody>
            @foreach($proveedors as $item)
                <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->nombreProveedor}}</td>
                <td>{{$item->telefonoProveedor}}</td>
                <td>{{$item->nombreVendedor}}</td>
                <td>{{$item->telefonoVendedor}}</td>
                <td>{{$item->plazoDevolucion}}</td>
                <td>
                    <a href="{{route('proveedor.show',$item->id)}}" ><i class="fa fa-edit"></i></a>
                    <a href="{{route('proveedor.destroy',$item)}}" data-toggle="modal" data-target="#deleteModal" data-proveedorid="{{$item->id}}" ><i class="fas fa-trash-alt"></i></a>
                </td>
                </tr>
          @endforeach
        </tbody>
      </table>
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
                <div class="modal-body">Seleccione "eliminar" Si realmente desea eliminar a este proveedor
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

@section('js_user_page')

    <script>
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var proveedor_id = button.data('proveedorid') 
            
            var modal = $(this)
            // modal.find('.modal-footer #user_id').val(user_id)
            modal.find('form').attr('action','/proveedor/' + proveedor_id + '/destoy');
        })
    </script>
    <script>
        $(document).ready(function() {
            $('#dataTable21').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
        });
    </script>
@endsection
@endsection
