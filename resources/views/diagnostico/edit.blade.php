@extends('admin.layouts.index')
@section('title','Diagnostico')
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
                        Editando diagnostico: 
                        <div class="pull-right">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm float-right" data-toggle="tooltip" data-placement="left" title data-original-title="Regresar a lista de proveedores">Regresar</a>
                        </div>
                    </div>
                </div>

                <x-errores class="mb-4" />
                <form action="{{route('diagnostico.update',$diagnostico)}}" method="POST">
                @csrf
                @method('put')
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">

                                 <div class="form-group has-feedback row">
                                    <label for="peso" class="col-12 control-label">Peso:</label>
                                    <div class="col-12">
                                      <input id="peso" type="text" class="form-control" name="peso" value="{{old('peso',$diagnostico->peso)}}" placeholder="Peso del paciente" >
                                    </div>
                                </div>
                                
                                <div class="form-group has-feedback row">
                                    <label for="altura" class="col-12 control-label">Altura:</label>
                                    <div class="col-12">
                                      <input id="altura" type="text" class="form-control" name="altura" value="{{old('altura',$diagnostico->altura)}}" placeholder="Altura del paciente" >
                                    </div>
                                </div>
                                
                                <div class="form-group has-feedback row">
                                    <label for="descripcionDiag" class="col-12 control-label">Descripcion de diagnostico:</label>
                                    <div class="col-12">
                                      <textarea name="descripcionDiag"id="descripcionDiag" class="form-control" value="{{old('descripcionDiag',$diagnostico->descripcionDiag)}}" id="descripcion" rows="3">{{old('descripcionDiag',$diagnostico->descripcionDiag)}}</textarea>
                                    </div>
                                </div>

                                <div class="form-group has-feedback row" id="recetaPDF">
                                    <label for="receta" class="col-12 control-label">Descripcion Receta:</label>
                                    <div class="col-12">
                                      <textarea name="receta" id="receta" class="form-control" value="{{old('receta',$diagnostico->receta)}}" id="receta" rows="3">{{$diagnostico->receta}}</textarea>

                                    </div>
    
                                </div>
                                                                
                            </div>
                          </div>
                 </div>
                 <div class="card-footer">

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-md-12">
                                <span data-toggle="tooltip" title data-original-title="Guardar cambios realizados">
                                <button type="submit" class="btn btn-success btn-lg btn-block" value="Editar" name="action">
                                    <i class="fa fa-save fa-fw">
                                        <span class="sr-only">
                                            Guardar diagnostico Icono
                                        </span>
                                    </i>
                                    Guardar diagnostico
                                    </button>
                                </span>
                            </div>
                        </div>
                    </div>
                    </div>
                  </form>
                  </div>
        </div>
    </div>
</div>   
@endsection
