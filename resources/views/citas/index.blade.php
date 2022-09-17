@extends('admin.layouts.index')

@section('content')

<div class="row py-lg-2">
    <div class="col-md-6">
       <h2>Lista de citas</h2>
    </div>
    <div class="col-md-6">
        <a href="/citas/create" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Nueva cita</a>
    </div>
</div>
<div>
  <ul class="nav nav-tabs" id="myTab" role="tablist">
    <li class="nav-item" role="presentation">
    <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home-tab-pane"
                type="button" role="tab" aria-controls="home-tab-pane" aria-selected="true">Citas</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane" type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Pendientes</button>
    </li>
    <li class="nav-item" role="presentation">
      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane" type="button" role="tab" aria-controls="profile-tab-pane">Canceladas</button>
    </li>
  </ul>
  <div class="tab-content" id="myTabContent">
    <div class="tab-pane fade show active" id="home-tab-pane" role="tabpanel" aria-labelledby="home-tab"tabindex="0">
      <form action="{{ route('citas.index') }}" method="GET">
        <div style="display: flex; align-items: flex-start; margin: 1em;">
          <div class="col-sm-6">
            <input class="form-control float-md-right" type="date" id="start-confirmada" name="fecha_cita_confirmada" min="2022-01-01">
          </div>
          <div class="col-sm-1">
            <button type="submit" class="btn btn-success filtrar">Filtrar</button>
          </div>
        </div>
      </form>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-table"></i>
          Tabla de citas
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTableCitas" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">Registró</th>
                  <th scope="col">Paciente</th>
                  <th scope="col">Fecha de cita</th>
                  <th scope="col">Hora de cita</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Opciones</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">Registró</th>
                  <th scope="col">Paciente</th>
                  <th scope="col">Fecha de cita</th>
                  <th scope="col">Hora de cita</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Opciones</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($citasConfirmadas as $item)
                  <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->user->name}}</td>
                    <td>{{$item->paciente}}</td>
                    <td>{{$item->fecha_cita}}</td>
                    <td>{{$item->hora_cita}}</td>
                    <td>
                      @if($item->estado == 2)
                        <span class="badge badge-primary">
                          Confirmada
                        </span>
                      @endif
                      @if($item->estado == 1)
                        <span class="badge badge-success">
                          Pendiente
                        </span>
                        @endif
                        @if($item->estado == 0)
                        <span class="badge badge-danger">
                          Cancelada
                        </span>
                        @endif
                    </td>
                    <td>
                      <a href="/citas/{{ $item['id'] }}"><i class="fa fa-eye"></i></a>
                      <a href="/citas/{{ $item['id'] }}/edit"><i class="fa fa-edit"></i></a>
                      <a href="#" class="edit" data-toggle="modal" data-target="#deleteModal" data-citaid="{{$item->id}}"><i class="fas fa-trash-alt"></i></a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
      <form action="{{ route('citas.index') }}" method="GET">
        <div style="display: flex; align-items: flex-start; margin: 1em;">
          <div class="col-sm-6">
            <input  class="form-control float-md-right" type="date" id="start-pendiente" name="fecha_cita_pendiente" min="2022-01-01">
          </div>
          <div class="col-sm-1">
            <button type="submit" class="btn btn-success filtrar">Filtrar</button>
          </div>
        </div>
      </form>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-table"></i>
          Tabla de citas pendientes
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTableCitasPendientes" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">Registró</th>
                  <th scope="col">Paciente</th>
                  <th scope="col">Fecha de cita</th>
                  <th scope="col">Hora de cita</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Opciones</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">Registró</th>
                  <th scope="col">Paciente</th>
                  <th scope="col">Fecha de cita</th>
                  <th scope="col">Hora de cita</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Opciones</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($citasPendientes as $item)
                  <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->user->name}}</td>
                    <td>{{$item->paciente}}</td>
                    <td>{{$item->fecha_cita}}</td>
                    <td>{{$item->hora_cita}}</td>
                    <td>
                      @if($item->estado == 2)
                        <span class="badge badge-success">
                          Terminada
                        </span>
                      @endif
                      @if($item->estado == 1)
                        <span class="badge badge-success">
                          Pendiente
                        </span>
                        @endif
                        @if($item->estado == 0)
                        <span class="badge badge-danger">
                          Cancelada
                        </span>
                        @endif
                    </td>
                    <td>
                      <a href="/citas/{{ $item['id'] }}"><i class="fa fa-eye"></i></a>
                      <a href="/citas/{{ $item['id'] }}/edit"><i class="fa fa-edit"></i></a>
                      <a href="#" class="edit" data-toggle="modal" data-target="#deleteModal" data-citaid="{{$item->id}}"><i class="fas fa-trash-alt"></i></a>
                      <a href="#" class="edit" data-toggle="modal" data-target="#confirmarModal" data-citaid="{{$item->id}}"><i class="fa-solid fa-check-to-slot"></i></a>
                    </td>
                  </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
    <div class="tab-pane fade" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
      <form action="{{ route('citas.index') }}" method="GET">
        <div style="display: flex; align-items: flex-start; margin: 1em;">
          <div class="col-sm-6">
            <input  class="form-control float-md-right" type="date" id="start-cancelada" name="fecha_cita_cancelada" min="2022-01-01">
          </div>
          <div class="col-sm-1">
            <button type="submit" class="btn btn-success filtrar">Filtrar</button>
          </div>
        </div>
      </form>
      <div class="card mb-3">
        <div class="card-header">
          <i class="fas fa-table"></i>
          Tabla de citas canceladas
        </div>
        <div class="card-body">
          <div class="table-responsive">
            <table class="table table-bordered" id="dataTableCitasCanceladas" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">Registró</th>
                  <th scope="col">Paciente</th>
                  <th scope="col">Fecha de cita</th>
                  <th scope="col">Hora de cita</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Opciones</th>
                </tr>
              </thead>
              <tfoot>
                <tr>
                  <th scope="col">id</th>
                  <th scope="col">Registró</th>
                  <th scope="col">Paciente</th>
                  <th scope="col">Fecha de cita</th>
                  <th scope="col">Hora de cita</th>
                  <th scope="col">Estado</th>
                  <th scope="col">Opciones</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($citasCanceladas as $item)
                  <tr>
                    <th scope="row">{{$item->id}}</th>
                    <td>{{$item->user->name}}</td>
                    <td>{{$item->paciente}}</td>
                    <td>{{$item->fecha_cita}}</td>
                    <td>{{$item->hora_cita}}</td>
                    <td>
                      @if($item->estado == 2)
                        <span class="badge badge-success">
                          Terminada
                        </span>
                      @endif
                      @if($item->estado == 1)
                        <span class="badge badge-success">
                          Pendiente
                        </span>
                        @endif
                        @if($item->estado == 0)
                        <span class="badge badge-danger">
                          Cancelada
                        </span>
                        @endif
                    </td>
                    <td>
                      <a href="/citas/{{ $item['id'] }}"><i class="fa fa-eye"></i></a>
                      <a href="/citas/{{ $item['id'] }}/edit"><i class="fa fa-edit"></i></a>
                      <!--<a href="#" class="edit" data-toggle="modal" data-target="#deleteModal" data-citaid="{{$item->id}}"><i class="fas fa-trash-alt"></i></a>-->
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

                    <!-- edi9t Modal-->
                    <div class="modal fade" id="deleteModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro de que quieres dar de baja esto?
</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">Seleccione "Dar de baja" Si realmente desea dar de baja a esta cita
</div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <form method="POST" action="">
                    @csrf()
                    <button type="submit" class="btn btn-danger btn-lg btn-block" name="action">Dar de baja</button>
                </form>
                </div>
            </div>
            </div>
        </div>
    </div>
    <div class="card-footer small text-muted"></div>
</div>

                    <!-- delete Modal-->
                    <div class="modal fade" id="confirmarModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">¿Estás seguro de que quiere confirmar la cita medica?
</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
                </div>
                <div class="modal-body">Seleccione "Confirmar" Si realmente desea confirmar esta cita
</div>
                <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                <form method="POST" action="" id="confirmarForm">
                    @csrf()
                    <button type="submit" class="btn btn-success btn-lg btn-block" name="action">Confirmar</button>
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

</script></scrip>
<script>
        $('#deleteModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var cita_id = button.data('citaid') 
            
            var modal = $(this)
            modal.find('form').attr('action','/citas/' + cita_id + '/cancel');
        })

        $('#confirmarModal').on('show.bs.modal', function (event) {
            var button = $(event.relatedTarget) 
            var cita_id = button.data('citaid') 
            
            var modal = $(this)
            modal.find('form').attr('action','/citas/' + cita_id + '/confirm');
        })

        
    </script>
    <script>
        $(document).ready(function() {
            $('#dataTableCitas').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
        });
        $(document).ready(function() {
            $('#dataTableCitasPendientes').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
        });
        $(document).ready(function() {
            $('#dataTableCitasCanceladas').DataTable({
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
        });
    </script>
@endsection
@endsection