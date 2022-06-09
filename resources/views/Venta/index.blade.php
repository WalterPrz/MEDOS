@extends('layouts.plantilla')
@section('title','Ventas')
@section('content')
<div>
    <h1>Ventas</h1>
   
    <form action="{{route('venta.store')}}" method="POST">
        @csrf
        <button type="submit" class="btn btn-success">Crear una Venta</button>
    </form> 
</div>
@endsection