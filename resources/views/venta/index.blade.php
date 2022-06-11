@extends('admin.layouts.index')

@section('content')
<div class="row py-lg-2">
    <div class="col-md-6">
       <h2>Ventas</h2>
    </div>
    <div class="col-md-6">
    <form action="{{route('venta.store')}}" method="POST">
        @csrf
        <button type="submit" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Crear una Venta</button>
    </form> 
    </div>
</div>
<div>
@endsection