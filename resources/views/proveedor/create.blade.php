@extends('admin.layouts.index')
@section('title','Proveedores')
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
                        Creando proveedor: 
                        <div class="pull-right">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm float-right" data-toggle="tooltip" data-placement="left" title data-original-title="Regresar a lista de proveedores">Regresar</a>
                        </div>
                    </div>
                </div>
                <x-errores class="mb-4" />
                <form action="{{route('proveedor.store')}}" method="POST">
                @csrf
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-feedback row">
                                    <label for="nombreProveedor" class="col-12 control-label">Nombre proveedor:</label>
                                    <div class="col-12">
                                    <input id="nombreProveedor" type="text" class="form-control" name="nombreProveedor" value="{{old('nombreProveedor')}}" placeholder="Nombre de el proveedor" >
                                    </div>
                                </div>
                                
                                <div class="form-group has-feedback row">
                                    <label for="telefonoProveedor" class="col-12 control-label">Teléfono proveedor:</label>
                                    <div class="col-12">
                                    <input id="telefonoProveedor" type="tel" class="form-control" name="telefonoProveedor" value="{{old('telefonoProveedor')}}" placeholder="(Código de área) Número">
                                    </div>
                                </div>

                                <div class="form-group has-feedback row">
                                    <label for="nombreVendedor" class="col-12 control-label">Nombre vendedor encargado:</label>
                                    <div class="col-12">
                                    <input id="nombreVendedor" type="text" class="form-control" name="nombreVendedor" value="{{old('nombreVendedor')}}" placeholder="Nombre de el vendedor">
                                    </div>
                                </div>
                                
                                <div class="form-group has-feedback row">
                                    <label for="telefonoVendedor" class="col-12 control-label">Teléfono vendedor encargado:</label>
                                    <div class="col-12">
                                    <input id="telefonoVendedor" type="tel" class="form-control" name="telefonoVendedor" value="{{old('telefonoVendedor')}}" placeholder="(Código de área) Número">
                                    </div>
                                </div>
                                
                                <div class="form-group has-feedback row">
                                    <label for="plazoDevolucion" class="col-12 control-label">Plazo de devolución (días):</label>
                                    <div class="col-12">
                                    <input id="plazoDevolucion" type="number" class="form-control" name="plazoDevolucion" value="{{old('plazoDevolucion')}}" placeholder="Plazo de devolución en dias">
                                    </div>
                                </div>
                                
                                
                            </div>
                          </div>
                 </div>
                 <div class="card-footer">
                        <div class="row">
                            <div class="col-md-6">
                                <span data-toggle="tooltip" title data-original-title="Guardar cambios realizados">
                                <button type="submit" class="btn btn-success btn-lg btn-block" value="Guardar" name="action">
                                    <i class="fa fa-save fa-fw">
                                        <span class="sr-only">
                                            Guardar proveedor Icono
                                        </span>
                                    </i>
                                    Guardar proveedor
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
