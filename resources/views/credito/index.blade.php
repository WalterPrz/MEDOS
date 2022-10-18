@extends('admin.layouts.index')
@section('title','Creditos')
@section('content')
<div class="row py-lg-2">
    <div class="col-md-6">
       <h2>Creditos</h2>
    </div>

    <div class="col-md-6">
        <a href="{{route('credito.create')}}" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Ingresar credito</a>
    </div>
</div>
<div>


<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Lista de creditos</div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable21" width="100%" cellspacing="0">
            <thead>
            <tr>
                <th scope="col">id</th>
                <th scope="col">Credito</th>
                <th scope="col">Dia de pago</th>
                <th scope="col">Proveedor</th>
                <th scope="col">Plazo de pago</th>
                <th scope="col">Saldo pendiente</th>
                <th scope="col">Fecha de creacion</th>
                <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tfoot>
        <tr>
            <th scope="col">id</th>
            <th scope="col">Credito</th>
            <th scope="col">Dia de pago</th>
            <th scope="col">Proveedor</th>
            <th scope="col">Plazo de pago</th>
            <th scope="col">Saldo pendiente</th>
            <th scope="col">Fecha de creacion</th>
            <th scope="col">Opciones</th>
          </tr>
        </tfoot>
        <tbody>
            @foreach($creditos as $item)
                <tr>
                    <th scope="row">{{ $item->id }}</th>
                    <td>{{ $item->credito}}</td>
                    <td>{{ $item->diaPago}}</td>
                    <td>{{ $item->proveedor->nombreProveedor}}</td>
                    <td>{{ $item->plazo}} dias</td>
                    <td>{{ $item->saldoPendiente}}</td>
                    <td>{{ $item->fechaCreacion}}</td>
                    <td>
                        <a href="{{ route('credito.edit', $item->id) }}"><i class="fa fa fa-edit"></i></a>
                        <a href="{{ route('credito.destroy', $item) }}" data-toggle="modal" data-target="#deleteModal" data-creditoid="{{ $item->id }}"><i class="fas fa-trash-alt"></i></a>
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
                <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro que quieres eliminar esto?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">Seleccione "Borrar" Si realmente desea eliminar este credito</div>
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
<div class="card-footer small text-muted"></div>

</div>

@section('js_user_page')

<script>
    $('#deleteModal').on('show.bs.modal', function (event) {
        var button = $(event.relatedTarget) 
        var credito_id = button.data('creditoid') 
            
        var modal = $(this)
        // modal.find('.modal-footer #user_id').val(user_id)
        modal.find('form').attr('action','/credito/destroy/' + credito_id);
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