@extends('layout.layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <h1 class="text-center">Detalles de la Venta</h1>
            <hr>
        </div>
    </div>

    <!-- Información de la Venta -->
    <div class="row">
        <div class="col-md-6">
            <h3>Datos de la Venta</h3>
            <p><strong>Número de Documento:</strong> {{ $venta->nrodoc }}</p>
            <p><strong>Tipo de Documento:</strong> {{ $venta->tipo->descripcion }}</p>
            <p><strong>Fecha de Venta:</strong> {{ \Carbon\Carbon::parse($venta->fecha_venta)->format('d/m/Y') }}</p>
            <p><strong>Total de la Venta:</strong> S/ {{ $venta->total }}</p>
        </div>
        <div class="col-md-6">
            <h3>Datos del Cliente</h3>
            <p><strong>Nombre del Cliente:</strong> {{ $venta->cliente->nombres }}</p>
            <p><strong>DNI:</strong> {{ $venta->cliente->DNI }}</p>
            <p><strong>Email:</strong> {{ $venta->cliente->email }}</p>
        </div>
    </div>

    <hr>

    <!-- Detalles de la Venta -->
    <div class="row">
        <div class="col-md-12">
            <h3>Productos en la Venta</h3>
            <div class="table-responsive">
                <table class="table table-striped table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Producto</th>
                            <th>Descripción</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Total</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($detalles as $detalle)
                            <tr>
                                <td>{{ $detalle->producto->nombre }}</td>
                                <td>{{ $detalle->producto->descripcion }}</td>
                                <td>{{ $detalle->cantidad }}</td>
                                <td>S/ {{ number_format($detalle->precio, 2) }}</td>
                                <td>S/ {{ number_format($detalle->cantidad * $detalle->precio, 2) }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Botón de Volver -->
    <div class="row">
        <div class="col-md-12 text-center pt-3">
            <a href="{{ route('ventas.index') }}" class="btn btn-primary">Volver a Ventas</a>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12 text-center pt-3">
            <a href="{{ route('venta.visualizar', $venta->venta_id) }}" class="btn btn-primary">Imprimir comprobante</a>
        </div>
    </div>
</div>
@endsection
