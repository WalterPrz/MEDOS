@extends('layouts.plantilla')
@section('title','Ingresar medicamento')
@section('content')
<div>
  <h1>Ingresar medicamentos</h1>
  <form action="{{route('ingresomed.store')}}" method='POST'>
    @csrf
    <div class='form-row'>
      <div class='col-md-4'>
      <label for='proveedor'>Proveedor</label>
        <select id='proveedor' name='proveedor' class='form-select'>
          <option selected='true' disabled='disabled'>Seleccionar proveedor</option>
          <option value='1'>Proveedor One</option>
          <option value='2'>Proveedor Two</option>
          <option value='3'>Proveedor Three</option>
        </select>
      </div>

      <div id='formulario'>
        <div id='campo1' class='col-md-4'>
        <label for='medicamento'>Medicamento</label>
          <select id='medicamento' name='medicamento[]' class='form-select'>
            <option selected='true' disabled='disabled'>Seleccionar medicamento</option>
            <option value='1'>Medicamento One</option>
            <option value='2'>Medicamento Two</option>
            <option value='3'>Medicamento Three</option>
          </select>
        </div>

        <div id='campo2' class='col-md-4'>
          <label for='cantidadIngreso'>Cantidad ingresada</label>
          <input id='cantidadIngreso' type='number' min='1' class='form-control' name='cantidadIngreso[]' placeholder='Cantidad ingresada'>
        </div>

        <div id='campo3' class='col-md-4'>
          <label for='precioCompra'>Precio de compra</label>
          <input id='precioCompra' type='number' min='0.01' step='0.01' class='form-control' name='precioCompra[]' placeholder='Nombre de la categoría'>
        </div>

        <div id='campo4' class='col-md-4'>
          <label for='descuentoIngreso'>Descuento</label>
          <input id='descuentoIngreso' type='text' class='form-control' name='descuentoIngreso[]' placeholder='Nombre de la categoría'>
        </div>

        <div id='campo5' class='col-md-4'>
          <label for='fechaVenc'>Fecha de vencimiento</label>
          <input id='fechaVenc' type='date' min="{{ date('Y-m-d') }}" class='form-control' name='fechaVenc[]' placeholder='Fecha de vencimiento'>
        </div>

        <div id='campo6' class='col-md-4'>
          <label for='precioCompraUnidad'>Precio de compra por unidad</label>
          <input id='precioCompraUnidad' type='number' min='0.01' step='0.01' class='form-control' name='precioCompraUnidad[]' placeholder='Precio de compra por unidad'>
        </div>

        <div id='campo7' class='col-md-4'>
          <label for='precioVentaUnidad'>Precio de venta</label>
          <input id='precioVentaUnidad' type='number' min='0.01' step='0.01' class='form-control' name='precioVentaUnidad[]' placeholder='Precio de venta'>
        </div>

      </div>

      <input value='Agregar' id='agregar' class='btn btn-primary' onclick='agregarMed()'></button>

      <div class='col-md-4'>
        <label for='listaMed'>Medicamentos ingresados</label>
        <textarea name='listaMed' class='form-control' disabled id='listaMed' rows='10'></textarea>
      </div>
    </div>
  <button type='submit' id='guardar' class='btn btn-primary'>Guardar</button>
  </form>   
</div>

<script>
  var array = [];

  function agregarMed() {
      var combo = document.getElementById('medicamento');
      var medic = combo.options[combo.selectedIndex].text;
      var cantidad = document.getElementById('cantidadIngreso').value;
      var precComp = document.getElementById('precioCompra').value;
      
      var lista = document.getElementById('listaMed').value;
      document.getElementById('listaMed').value = lista + medic + ' - ' + cantidad + ' - $' + precComp + "\n";

      document.getElementById('campo1').style.display = 'none';
      document.getElementById('campo2').style.display = 'none';
      document.getElementById('campo3').style.display = 'none';
      document.getElementById('campo4').style.display = 'none';
      document.getElementById('campo5').style.display = 'none';
      document.getElementById('campo6').style.display = 'none';
      document.getElementById('campo7').style.display = 'none';

      var text = "<div id='campo1' class='col-md-4'>\
      <label for='medicamento'>Medicamento</label>\
        <select id='medicamento' name='medicamento[]' class='form-select'>\
          <option selected='true' disabled='disabled'>Seleccionar medicamento</option>\
          <option value='1'>Medicamento One</option>\
          <option value='2'>Medicamento Two</option>\
          <option value='3'>Medicamento Three</option>\
        </select>\
      </div>\
\
      <div id='campo2' class='col-md-4'>\
        <label for='cantidadIngreso'>Cantidad ingresada</label>\
        <input id='cantidadIngreso' type='number' min='1' class='form-control' name='cantidadIngreso[]' placeholder='Cantidad ingresada'>\
      </div>\
\
      <div id='campo3' class='col-md-4'>\
        <label for='precioCompra'>Precio de compra</label>\
        <input id='precioCompra' type='number' min='0.01' step='0.01' class='form-control' name='precioCompra[]' placeholder='Nombre de la categoría'>\
      </div>\
      \
      <div id='campo4' class='col-md-4'>\
        <label for='descuentoIngreso'>Descuento</label>\
        <input id='descuentoIngreso' type='text' class='form-control' name='descuentoIngreso[]' placeholder='Nombre de la categoría'>\
      </div>\
      \
      <div id='campo5' class='col-md-4'>\
        <label for='fechaVenc'>Fecha de vencimiento</label>\
        <input id='fechaVenc' type='date' min=\"{{ date('Y-m-d') }}\" class='form-control' name='fechaVenc[]' placeholder='Fecha de vencimiento'>\
      </div>\
      \
      <div id='campo6' class='col-md-4'>\
        <label for='precioCompraUnidad'>Precio de compra por unidad</label>\
        <input id='precioCompraUnidad' type='number' min='0.01' step='0.01' class='form-control' name='precioCompraUnidad[]' placeholder='Precio de compra por unidad'>\
      </div>\
      \
      <div id='campo7' class='col-md-4'>\
        <label for='precioVentaUnidad'>Precio de venta</label>\
        <input id='precioVentaUnidad' type='number' min='0.01' step='0.01' class='form-control' name='precioVentaUnidad[]' placeholder='Precio de venta'>\
      </div>\
      \
      ";                                    
      document.getElementById("formulario").innerHTML=text;
  }

</script>
@endsection