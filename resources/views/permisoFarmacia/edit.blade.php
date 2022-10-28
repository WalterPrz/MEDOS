@extends('admin.layouts.index')
@section('title','Permiso Farmacia')
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
                        Editando permiso farmacia:
                        <div class="pull-right">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm float-right" data-toggle="tooltip" data-placement="left" title data-original-title="Regresar a lista de proveedores">Regresar</a>
                        </div>
                    </div>
                </div>

                <x-errores class="mb-4" />
                <form action="{{route('permisoFarmacia.update',$permiso)}}" method="POST">
                @csrf
                @method('put')
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-feedback row">
                                    <label for="nombrePermisoFarm" class="col-12 control-label">Nombre permiso farmacia:</label>
                                    <div class="col-12">
                                    <input  value="{{old('nombrePermisoFarm',$permiso->nombrePermisoFarm)}}" id="nombrePermisoFarm" type="text" class="form-control" name="nombrePermisoFarm" placeholder="Nombre de el permiso de farmacia" required>
                                    </div>
                                </div>

                                <div class="form-group has-feedback row">
                                    <label for="monto" class="col-12 control-label">Monto:</label>
                                    <div class="col-12">
                                    <input value="{{old('monto',$permiso->monto)}}" name="monto"  type="number" step="any" class="form-control" name="Monto $" required>
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
