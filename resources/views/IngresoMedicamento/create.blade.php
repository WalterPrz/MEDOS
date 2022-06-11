@extends('admin.layouts.index')

@section('content')

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
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
            Ingresar medicamentos
          </div>
          </div>
            <form action="{{route('ingresomed.store')}}" method='POST'>
              @csrf
              <div class="card-body">
                <div class="row">
                  <div class="col-md-8">
                    <div class="form-group has-feedback row">
                      <label for="proveedor" class="col-12 control-label">Seleccionar proveedor</label>
                      <div class="col-12">
                        <select class="proveedor form-control" name="proveedor" id="proveedor">
                          <option selected='true' disabled='disabled'>Seleccionar proveedor</option>
                          <option value='1'>Proveedor One</option>
                          <option value='2'>Proveedor Two</option>
                          <option option value='3'>Proveedor Three</option>
                        </select>
                      </div>
                    </div>
                    <div class="form-group has-feedback row">
                      <label for="fechaIngreso" class="col-12 control-label">Fecha del ingreso:</label>
                      <div class="col-12">
                        <input id='fechaIngreso' type='text' value="{{ date('d-m-Y') }}" class='form-control' name='fechaIngreso' disabled placeholder='Fecha'>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
                  <div class="card-footer">
                    <div class="row">
                      <div class="col-md-6">
                        <span data-toggle="tooltip" title data-original-title="Guardar">
                          <button type="submit" class="btn btn-success btn-lg btn-block" id="guardar" value="Guardar" name="action">
                            <i class="fa fa-save fa-fw">
                              <span class="sr-only">
                                Guardar Icono
                              </span>
                            </i>
                            Guardar 
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
  </div>

@endsection