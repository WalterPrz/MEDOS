@extends('admin.layouts.index')

@section('content')

<div class="row py-lg-2">
    <div class="col-md-6">
       <h2>Detalle de la Venta</h2>
    </div>
</div>


<div class="card mb-3">
  <div class="card-header">
      <i class="fas fa-table"></i>
        Ingresa los medicamentos
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable1" width="100%" cellspacing="0">
          <thead>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Nombre Comercial</th>
              <th scope="col">Precio Venta</th>
              <th scope="col">Agregar</th>
            </tr>
          </thead>
          <tfoot>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Nombre Comercial</th>
              <th scope="col">Precio Venta</th>
              <th scope="col">Agregar</th>
            </tr>
          </tfoot>
          <tbody>
            @foreach($medicamentos as $item)
            <tr>
              <th scope="row">{{$item->id}}</th>
              <td>{{$item->nombre_comercial}}</td>
              <td>{{$item->precio_venta}}</td>
              <td>
                <form action="{{route('detalleventa.store',['venta'=>$venta->id,'medicamento'=>$item->id])}}" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-success">Agregar</button>
                </form> 
              </td>
            </tr>
            @endforeach
          </tbody>
      </table>
    </div>
  </div>
</div>
<div class="card mb-3">
  <div class="card-header">
      <i class="fas fa-table"></i>
        Medicamentos ingresados en la venta
  </div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable2"  width="100%" cellspacing="0">
          <thead>
            <tr>
            <th scope="col">id</th>
            <th scope="col">Medicamento</th>
            <th scope="col">Precio Unitario</th>
            <th scope="col">Cantidad Venta</th>
            <th scope="col">SubTotal</th>
            <!--<th scope="col">Operacion</th>-->
            <th scope="col">Opciones</th>
          </tr>
        </thead>
        <tfoot>
            <tr>
              <th scope="col">id</th>
              <th scope="col">Medicamento</th>
              <th scope="col">Precio Unitario</th>
              <th scope="col">Cantidad Venta</th>
              <th scope="col">SubTotal</th>
              <!--<th scope="col">Operacion</th>-->
              <th scope="col">Opciones</th>
            </tr>
          </tfoot>
        <tbody>
            @foreach($detalle_venta as $item)
                <tr>
                <th scope="row">{{$item->id}}</th>
                <td>{{$item->medicamento->nombre_comercial}}</td>
                <td>{{$item->medicamento->precio_venta}}</td>
                <td>{{$item->cantidad_venta}}</td>
                <td>{{$item->cantidad_venta*$item->medicamento->precio_venta}}</td>
                <!--<td>{{$item->precio_venta}}</td>-->
                <td>
                    <a href="{{route('categoria.show',$item->id)}}"><i class="fa fa-edit"></i></a>
                    <a href="{{route('categoria.destroy',$item)}}" ><i class="fas fa-trash-alt"></i></a>
                </td>
                </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

@section('js_venta_page')

    <script>
$(document).ready(function() {
    $('#dataTable1').DataTable({
      "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
    });
    $('#dataTable2').DataTable({
      "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
    });
});
    </script>

@endsection

@endsection