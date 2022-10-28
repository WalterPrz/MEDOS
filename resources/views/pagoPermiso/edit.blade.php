@extends('admin.layouts.index')
@section('title','Pago permisos')
@section('content')

<div class="container">
    <div class="row">
        <div class="col-sm-12"></div>
    </div>
</div>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card card-post" id="post_card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        Editando pago de permiso:
                        <div class="pull-right">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm float-right" data-toggle="tooltip" data-placement="left" title data-original-title="Regresar a lista de proveedores">Regresar</a>
                        </div>
                    </div>
                </div>

                <x-errores class="mb-4" />
                <form action="{{route('pagoPermiso.update',$permiso)}}" method="POST">
                @csrf
                @method('put')
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">

                            <div class="form-group has-feedback row">
                                    <label for="idPermisoFarmacia" class="col-12 control-label">Permiso:</label>
                                    <div class="col-12">
                                        <select class="permiso form-control" name="idPermisoFarmacia" id="idPermisoFarmacia" disabled>
                                                    <option selected='true' disabled='disabled' value="{{ old('idPermisoFarmacia')}}" >{{old('idPermisoFarmacia',$permiso->idPermisoFarmacia->nombrePermisoFarm)}}</option>

                                        </select>
                                    </div>
                                </div>

                                <div class="form-group has-feedback row">
                                    <label for="monto" class="col-12 control-label">Monto permiso ($):</label>
                                    <div class="col-12">
                                        <input value="{{old('monto',$permiso->monto)}}" name="monto"  type="number" step="any" class="form-control" name="Monto $" disabled>
                                    </div>
                                </div>



                            </div>
                          </div>
                 </div>
                 <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <span data-toggle="tooltip" title data-original-title="Guardar cambios realizados">
                                <button type="submit" class="btn btn-success btn-lg btn-block" value="Editar" name="action">
                                    <i class="fa fa-save fa-fw">
                                        <span class="sr-only">
                                            Guardar permiso farmacia Icono
                                        </span>
                                    </i>
                                    Editar permiso farmacia
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                  </form>
                  </div>
        </div>
    </div>
</div>
@endsection
