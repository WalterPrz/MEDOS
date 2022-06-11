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

      <div class='col-md-4'>
        <label for='fechaIngreso'>Fecha del ingreso</label>
        <input id='fechaIngreso' type='text' value="{{ date('d-m-Y') }}" class='form-control' name='fechaIngreso' disabled placeholder='Fecha'>
      </div>

    </div>
  <button type='submit' id='guardar' class='btn btn-primary'>Guardar</button>
  </form>   
</div>
@endsection