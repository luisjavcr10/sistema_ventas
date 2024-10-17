<!DOCTYPE html>
<html>
<head>
    <title>Factura #{{ $venta->venta_id }}</title>
    <style>
        /* Agrega estilos aquí si es necesario */
    </style>
</head>
<body>
    <h1>Factura #{{ $venta->venta_id }}</h1>
    <h3>Datos de la Venta</h3>
    <p><strong>Número de Documento:</strong> {{ $venta->nrodoc }}</p>
    <p><strong>Tipo de Documento:</strong> {{ $venta->tipo->descripcion }}</p>
    <p><strong>Fecha de Venta:</strong> {{ \Carbon\Carbon::parse($venta->fecha_venta)->format('d/m/Y') }}</p>
    <p><strong>Total de la Venta:</strong> S/ {{ $venta->total }}</p>
    
    <h3>Datos del Cliente</h3>
    <p><strong>Nombre del Cliente:</strong> {{ $venta->cliente->nombres }}</p>
    <p><strong>DNI:</strong> {{ $venta->cliente->DNI }}</p>
    <p><strong>Email:</strong> {{ $venta->cliente->email }}</p>

    <h3>Productos en la Venta</h3>
    <table>
        <thead>
            <tr>
                <th>Producto</th>
                <th>Descripción</th>
                <th>Cantidad</th>
                <th>Precio Unitario</th>
                <th>Total</th>
            </tr>
        </thead>
        <tbody>
            @foreach($venta->detalleventas as $detalle)
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
</body>
</html>
