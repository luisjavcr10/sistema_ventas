@extends('layout.layout')

@section('content')
<div class="container mt-5">
    <h1 class="text-center mb-5">Productos Disponibles</h1>

    <div class="d-flex justify-content-end mb-3">
        <a href="{{ route('carrito.mostrar') }}" class="btn btn-outline-secondary">Ver Carrito <i class="fas fa-shopping-cart"></i></a>
    </div>

    <div class="row">
        @foreach($productos as $producto)
            <div class="col-md-4">
                <div class="card shadow-sm mb-4">
                    <div class="card-body">
                        <h5 class="card-title">{{ $producto->nombre }}</h5>
                        <p class="card-text"><strong>Precio:</strong> S/ {{ number_format($producto->precio, 2) }}</p>
                        <p class="card-text"><strong>Stock:</strong> {{ $producto->stock }}</p>
                        <form action="{{ route('carrito.agregar') }}" method="POST">
                            @csrf
                            <input type="hidden" name="producto_id" value="{{ $producto->id }}">
                            <button type="submit" class="btn btn-primary btn-block">Agregar al carrito <i class="fas fa-cart-plus"></i></button>
                        </form>
                    </div>
                </div>
            </div>
        @endforeach
    </div>

    <!-- Mostrar un mensaje de éxito si se agregó el producto -->
    @if(session('success'))
        <div class="alert alert-success mt-4">
            {{ session('success') }}
        </div>
    @endif
</div>
@endsection
