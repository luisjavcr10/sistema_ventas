@extends('layout.layout')

@section('content')

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h3 class="text-center my-4">Historial de Ventas</h3>
            <a href="{{ route('venta.index') }}" class="btn btn-success mb-3">
                <i class="fas fa-plus-circle"></i> Ingresar nueva venta
            </a>
            <div class="table-responsive">
                <table class="table table-bordered table-striped table-hover">
                    <thead class="thead-dark">
                        <tr>
                            <th>Código</th>
                            <th>Descripción</th>
                            <th>Fecha</th>
                            <th>DNI</th>
                            <th>Cliente</th>
                            <th>Total</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($ventas as $itemventa)
                        <tr>
                            <td>{{ $itemventa->venta_id }}</td>
                            <td>{{ $itemventa->tipo->descripcion }}</td>
                            <td>{{ \Carbon\Carbon::parse($itemventa->fecha_venta)->format('d/m/Y') }}</td>
                            <td>{{ $itemventa->cliente->DNI }}</td>
                            <td>{{ $itemventa->cliente->nombres }}</td>
                            <td>S/ {{ number_format($itemventa->total, 2) }}</td>
                            <td class="text-center">
                                <a href="{{ route('venta.detalle', $itemventa->venta_id) }}" class="btn btn-info btn-sm">
                                    <i class="fas fa-info-circle"></i> Detalles
                                </a>
                                <a href="{{ route('venta.visualizar', $itemventa->venta_id) }}" class="btn btn-primary btn-sm" target="_blank">
                                    <i class="fas fa-print"></i> Imprimir
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

@endsection
