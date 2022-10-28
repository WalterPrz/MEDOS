@extends('admin.layouts.index')
@section('title','Medicamentos')
@section('content')

<div class="container">
    <div class="row py-lg-2">
        <div class="col-md-6">
        <h2>Ingresar Medicamentos</h2>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card card-post" id="post_card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        Ingresando Medicamentos: 
                        <div class="pull-right">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm float-right" data-toggle="tooltip" data-placement="left" title data-original-title="Regresar a lista de medicamentos">Regresar</a>
                        </div>
                    </div>
                </div>
                <x-errores class="mb-4" />
                <form action="{{route('medicamento.store')}}" method="POST">
                @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group has-feedback row">
                                    <label for="categoria_id" class="col-12 control-label">Categoria medicamento:</label>
                                    <div class="col-12">
                                        <select class="categoria_id form-control" name="categoria_id" id="categoria_id" value="{{old('categoria_id')}}">
                                            <option selected='true' disabled='disabled'>Seleccionar categoria de medicamento</option>
                                                @foreach( $categorias as $item )
                                                <option value="{{ $item->id }}">{{ $item->nombre }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group has-feedback row">
                                    <label for="nombre_comercial" class="col-12 control-label">Nombre comercial:</label>
                                    <div class="col-12">
                                        <input name="nombre_comercial" class="form-control" type="text"value="{{ old('nombre_comercial') }}" id="nombre_comercial"></input>
                                    </div>
                                </div>

                                <div class="form-group has-feedback row">
                                    <label for="presentacion" class="col-12 control-label">Presentación:</label>
                                    <div class="col-12">
                                        <input name="presentacion" class="form-control" type="text" value="{{ old('presentacion') }}" id="presentacion"></input>
                                    </div>
                                </div>

                                <div class="form-group has-feedback row">
                                    <label for="componentes" class="col-12 control-label">Componentes:</label>
                                    <div class="col-12">
                                        <input name="componentes" class="form-control" type="text" value="{{ old('componentes') }}" id="componentes"></input>
                                    </div>
                                </div>

                                <div class="form-group has-feedback row">
                                    <label for="precio_venta" class="col-12 control-label">Precio de venta:</label>
                                    <div class="col-12">
                                        <input name="precio_venta" class="form-control" type="number" min="0.01" max="999" step="0.01" value="{{ old('precio_venta') }}" id="precio_venta"></input>
                                    </div>
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
                                            Guardar Icono
                                        </span>
                                    </i>
                                    Guardar abono
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
<div>

@endsection