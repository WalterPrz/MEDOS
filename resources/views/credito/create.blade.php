@extends('admin.layouts.index')
@section('title','Creditos')
@section('content')

<div class="container">
    <div class="row py-lg-2">
        <div class="col-md-6">
        <h2>Ingresar credito</h2>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card card-post" id="post_card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        Ingresando credito: 
                        <div class="pull-right">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm float-right" data-toggle="tooltip" data-placement="left" title data-original-title="Regresar a lista de expedientes">Regresar</a>
                        </div>
                    </div>
                </div>
                <x-errores class="mb-4" />
                <form action="{{route('credito.store')}}" method="POST">
                @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">
                                <div class="form-group has-feedback row">
                                    <label for="proveedor_id" class="col-12 control-label">Proveedor:</label>
                                    <div class="col-12">
                                        <select class="proveedor_id form-control" name="proveedor_id" id="proveedor_id" value="{{old('proveedor_id')}}">
                                            <option selected='true' disabled='disabled'>Seleccionar proveedor</option>
                                                @foreach( $proveedores as $item )
                                                    <option value="{{ $item->id }}">{{ $item->nombreProveedor }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group has-feedback row">
                                    <label for="credito" class="col-12 control-label">Monto del credito:</label>
                                    <div class="col-12">
                                        <input name="credito" class="form-control" type="number" min="0.01" max="999" step="0.01" value="{{ old('credito') }}" id="credito"></input>
                                    </div>
                                </div>
                                <div class="form-group has-feedback row">
                                    <label for="diaPago" class="col-12 control-label">Dia de pago:</label>
                                    <div class="col-12">
                                        <select name="diaPago" id="diaPago" class="form-control">
                                            <option value="Lunes" @if(old('diaPago') == 'Lunes') {{ 'selected' }} @endif>Lunes</option>
                                            <option value="Martes" @if(old('diaPago') == 'Martes') {{ 'selected' }} @endif>Martes</option>
                                            <option value="Miercoles" @if(old('diaPago') == 'Miercoles') {{ 'selected' }} @endif>Miercoles</option>
                                            <option value="Jueves" @if(old('diaPago') == 'Jueves') {{ 'selected' }} @endif>Jueves</option>
                                            <option value="Viernes" @if(old('diaPago') == 'Viernes') {{ 'selected' }} @endif>Viernes</option>
                                            <option value="Sabado" @if(old('diaPago') == 'Sabado') {{ 'selected' }} @endif>Sabado</option>
                                            <option value="Domingo" @if(old('diaPago') == 'Domingo') {{ 'selected' }} @endif>Domingo</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group has-feedback row">
                                    <label for="saldoPendiente" class="col-12 control-label">Saldo pendiente:</label>
                                    <div class="col-12">
                                        <input name="saldoPendiente" class="form-control" type="number" min="0.01" max="999" step="0.01" value="{{ old('saldoPendiente') }}" id="saldoPendiente"></input>
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
                                    Guardar credito
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