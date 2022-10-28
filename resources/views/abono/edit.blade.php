@extends('admin.layouts.index')
@section('title','Abonos')
@section('content')

<div class="container">
    <div class="row py-lg-2">
        <div class="col-md-6">
        <h2>Actualizar abonos</h2>
        </div>
    </div>


    <div class="row">
        <div class="col-12">
            <div class="card card-post" id="post_card">
                <div class="card-header">
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        Actualizando Abono: 
                        <div class="pull-right">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm float-right" data-toggle="tooltip" data-placement="left" title data-original-title="Regresar a lista de expedientes">Regresar</a>
                        </div>
                    </div>
                </div>
                <x-errores class="mb-4" />
                <form action="{{route('abono.update', $abono)}}" method="POST">
                @csrf
                @method('put')
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-8">

                                <div class="form-group has-feedback row">
                                    <div class="col-12">
                                        <input name="credito_id" class="form-control" type="hidden" value="{{ $nombre }}" id="credito_id"></input>
                                    </div>
                                </div>
                                <div class="form-group has-feedback row">
                                    <label for="cantidadAbonada" class="col-12 control-label">Cantidad Abonada:</label>
                                    <div class="col-12">
                                        <input name="cantidadAbonada" class="form-control" type="number" min="0.01" max="{{ $maxVal }}" step="0.01" value="{{ old('cantidadAbonada', $abono->cantidadAbonada) }}" id="cantidadAbonada"></input>
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
                                            Actualizar Icono
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