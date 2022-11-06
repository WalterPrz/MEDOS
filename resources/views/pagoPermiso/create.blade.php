@extends('admin.layouts.index')
@section('title','Pago permiso Farmacia')
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
                        Registrando pago de permiso de farmacia:
                        <div class="pull-right">
                            <a href="{{ url()->previous() }}" class="btn btn-outline-secondary btn-sm float-right" data-toggle="tooltip" data-placement="left" title data-original-title="Regresar a lista de pagos de permisos realizados">Regresar</a>
                        </div>
                    </div>
                </div>
                <x-errores class="mb-4" />
                <form action="{{route('pagoPermiso.store')}}" method="POST">
                @csrf
                <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="form-group has-feedback row">
                                    <label for="nombrePermisoFarm" class="col-12 control-label">Permiso:</label>
                                    <div class="col-12">
                                        <select onchange="myFunction()" class="permiso form-control" name="idPermisoFarmacia" id="idPermisoFarmacia">
                                            <option selected='true' disabled='disabled'>Seleccionar permiso a pagar</option>
                                                @foreach( $permiso as $item )
                                                    <option value="{{ $item->id }}" data-value2="{{ $item->monto }}">{{ $item->nombrePermisoFarm }}</option>
                                                @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group has-feedback row">
                                    <label for="monto" class="col-12 control-label">Monto permiso($):</label>
                                    <div class="col-12">
                                    <input id="monto" type="number" step="any" class="form-control demo" name="monto" disabled>
                                    </div>
                                </div>
                                <div class="form-group has-feedback row">
                                    <label for="monto" class="col-12 control-label">Fecha de pago de permiso:</label>
                                    <div class="col-12">
                                         <input value="" class="form-control float-md-right" type="date" name="fechaPago" id="fechaPago" min="2022-01-01">
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
                                            Registrar pago Icono
                                        </span>
                                    </i>
                                        Registrar pago de permiso
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
<script>
function myFunction() {

    var x = document.getElementById("idPermisoFarmacia").value;
    document.querySelector('.demo').defaultValue = idPermisoFarmacia.selectedOptions[0].getAttribute("data-value2");

}
</script>
<script>
    window.onload = function(){
  var fecha = new Date(); //Fecha actual
  var mes = fecha.getMonth()+1; //obteniendo mes
  var dia = fecha.getDate(); //obteniendo dia
  var ano = fecha.getFullYear(); //obteniendo año
  if(dia<10)
    dia='0'+dia; //agrega cero si el menor de 10
  if(mes<10)
    mes='0'+mes //agrega cero si el menor de 10
  document.getElementById('fechaPago').value=ano+"-"+mes+"-"+dia;
}
</script>
@endsection
