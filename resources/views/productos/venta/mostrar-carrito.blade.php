@extends('layout.layout')

@section('content')

<div class="container my-4">
    <h2 class="text-center mb-4">Carrito de Compras</h2>

    @if(session('carrito'))
        <div class="table-responsive">
            <table class="table table-bordered table-striped">
                <thead class="thead-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Precio</th>
                        <th>Cantidad</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach(session('carrito') as $id => $detalles)
                        <tr>
                            <td>{{ $detalles['nombre'] }}</td>
                            <td>S/ {{ number_format($detalles['precio'], 2) }}</td>
                            <td>{{ $detalles['cantidad'] }}</td>
                            <td>
                                <form action="{{ route('carrito.eliminar') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="producto_id" value="{{ $id }}">
                                    <button type="submit" class="btn btn-danger btn-sm">
                                        <i class="fas fa-trash-alt"></i> Eliminar
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <!-- Botón para ir a la página de registro de la venta -->
        <div class="text-right mt-3">
            <a href="{{ route('ventas.crear') }}" class="btn btn-success btn-lg">
                <i class="fas fa-check"></i> Realizar Venta
            </a>
        </div>
        <div class="text-right mt-3">
            <a href="{{ route('carrito.cancelar') }}" class="btn btn-success btn-lg">
                <i class="fas fa-check"></i> Cancelar selección
            </a>
        </div>

    @else
        <div class="alert alert-warning text-center">
            <h4>Tu carrito está vacío.</h4>
        </div>
    @endif
</div>

@endsection
