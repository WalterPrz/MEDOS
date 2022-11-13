@extends('admin.layouts.index')
@section('title', 'Med. Próx. a Vencer')
@section('content')
    <div class="row py-lg-2">
        <div class="col-md-6">
            <h2>Productos próximos a vencer</h2>
        </div>
        <div class="col-md-6">
            <form action="{{ route('devolucion.index') }}" method="GET">
                @csrf
                <button type="submit" class="btn btn-primary btn-lg float-md-right" role="button" aria-pressed="true">Crear
                    una Devolucion</button>
            </form>
        </div>
    </div>
    <div>
        <div class="container-fluid">
            <form role="search">
                <div style="display: flex; align-items: flex-start; margin-top: 1em;">
                    <div class="col-sm-6">
                        <input name="buscarpor" class="form-control float-md-right" type="search"
                            placeholder="Buscar por nombre medicamento" aria-label="Buscar">
                    </div>
                    <div class="col-sm-1">
                        <button type="submit" class="btn btn-success">Buscar</button>
                    </div>

                </div>
            </form>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable25" width="100%" cellspacing="0">
                    <thead>
                        <tr>

                            <th scope="col">Nombre comercial medicamento</th>
                            <th scope="col">Fecha de vencimiento</th>
                            <th scope="col">Fecha de ingreso</th>
                            <th scope="col">Proveedor</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th scope="col">Nombre comercial medicamento</th>
                            <th scope="col">Fecha de vencimiento</th>
                            <th scope="col">Fecha de ingreso</th>
                            <th scope="col">Proveedor</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        @foreach ($filtered as $item)
                            <tr>
                                <th>{{ $item->medicamento->nombre_comercial }}</th>
                                <td>{{ $item->fechaVenc }}</td>
                                <td>{{ $item->ingresoMedicamento->fechaIngreso }}</td>
                                <td>{{ $item->ingresoMedicamento->credito->proveedor->nombreProveedor }}</td>
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
            $('#dataTable25').DataTable({
                dom: '<"top"i>rt<"bottom"flp><"clear">',
                "language": {
                    "url": "//cdn.datatables.net/plug-ins/1.10.15/i18n/Spanish.json"
                }
            });
        });
    </script>

@endsection
@endsection
