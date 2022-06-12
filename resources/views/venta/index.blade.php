@extends('admin.layouts.index')

@section('content')
    <div>
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
        <ul class="nav nav-tabs" id="myTab" role="tablist">
            <li class="nav-item" role="presentation">
                <button class="nav-link active" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile-tab-pane"
                    type="button" role="tab" aria-controls="profile-tab-pane" aria-selected="false">Consultar
                    Ventas</button>
            </li>
            <li class="nav-item" role="presentation">
                <button class="nav-link" id="contact-tab" data-bs-toggle="tab" data-bs-target="#contact-tab-pane"
                    type="button" role="tab" aria-controls="contact-tab-pane" aria-selected="false">Ventas AÚN SIN
                    COMPLETAR</button>
            </li>
        </ul>
        <div class="tab-content" id="myTabContent">
            <div class="tab-pane fade show active" id="profile-tab-pane" role="tabpanel" aria-labelledby="profile-tab" tabindex="0">
                <form action="{{ route('venta.index') }}" method="GET">
                    <div style="display: flex; align-items: flex-start; margin-top: 1em;">
                        <div class="col-sm-6">
                            <input  class="form-control float-md-right" type="date" id="start" name="fecha_venta" min="2022-01-01">
                        </div>
                        <div class="col-sm-1">
                            <button type="submit" class="btn btn-success">Filtrar</button>
                        </div>
                    </div>
                </form>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable10" width="100%" cellspacing="0">
                        <thead>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">fecha</th>
                            <th scope="col">Ver</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">id</th>
                            <th scope="col">fecha</th>
                            <th scope="col">Ver</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($ventas as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->fecha_venta }}</td>
                                <td>
                                    <a href="{{ route('venta.detalle', $item->id) }}"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
            </div>
            <div class="tab-pane fade" id="contact-tab-pane" role="tabpanel" aria-labelledby="contact-tab" tabindex="0">
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable11" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">fecha</th>
                                    <th scope="col">Ver</th>
                                </tr>
                            </thead>
                            <tfoot>
                                <tr>
                                    <th scope="col">id</th>
                                    <th scope="col">fecha</th>
                                    <th scope="col">Ver</th>
                                </tr>
                            </tfoot>
                            <tbody>
                            @foreach ($ventasSinCompletar as $item)
                            <tr>
                                <th scope="row">{{ $item->id }}</th>
                                <td>{{ $item->fecha_venta }}</td>
                                <td>
                                    <a href="{{ route('venta.detalle', $item->id) }}"><i class="fa fa-edit"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            </div>
            </div>
        </div>
    </div>

@section('js_venta_page')

<script>
    $(document).ready(function() {
    $('#dataTable10').DataTable({
        "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
    });
    $('#dataTable11').DataTable({
        "language": {
                "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
        }
    });
});
</script>

@endsection

@endsection

