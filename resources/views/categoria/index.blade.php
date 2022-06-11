@extends('admin.layouts.index')

@section('content')

<div class="row py-lg-2">
  <div class="col-md-6">
       <h2>Lista de categorias</h2>
  </div>
  <div class="col-md-6">
    <a href="{{route('categoria.create')}}" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Nueva categoria</a>
  </div>
</div>


<div>
<div class="card mb-3">
    <div class="card-header">
        <i class="fas fa-table"></i>
        Tabla de categorias</div>
    <div class="card-body">
        <div class="table-responsive">
        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
            <thead>
          <tr>
            <th scope="col">id</th>
            <th scope="col">Nombre</th>
            <th scope="col">Descripción</th>
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tfoot>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Nombre</th>
              <th scope="col">Descripción</th>
              <th scope="col">Opciones</th>
            </tr>
         </tfoot>
        <tbody>
            @foreach($categorias as $item)
                <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->nombre}}</td>
                <td>{{$item->descripcion}}</td>
                <td>
                    <a href="{{route('categoria.show',$item->id)}}"><i class="fa fa-edit"></i></a>
                    <a href="{{route('categoria.destroy',$item)}}" data-toggle="modal" data-target="#deleteModal" data-categoriaid="{{$item->id}}"><i class="fas fa-trash-alt"></i></a>
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
                <div class="modal-body">Seleccione "eliminar" Si realmente desea eliminar a esta usuario
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
            var categoria_id = button.data('categoriaid') 
            
            var modal = $(this)
            // modal.find('.modal-footer #user_id').val(user_id)
            modal.find('form').attr('action','/categoria/' + categoria_id + '/destroy');
        })
    </script>

@endsection

@endsection