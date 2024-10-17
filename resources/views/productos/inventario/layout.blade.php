@extends('layout.layout')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center">Lista de Productos</h1>

    <div class="d-flex justify-content-center mb-4">
        <select id="category-select" class="form-select w-auto" onchange="filterProducts(this)">
            <option value="{{ route('productos.index') }}" 
                    {{ request()->routeIs('productos.index') ? 'selected' : '' }}>
                Todo
            </option>
            @foreach($categorias as $categoria)
                <option value="{{ route('productos.filterByCategory', $categoria->id) }}" 
                        {{ request()->is('productos/filterByCategory/' . $categoria->id) ? 'selected' : '' }}>
                    {{ $categoria->nombre }}
                </option>
            @endforeach
        </select>
    </div>

    <div id="product-list" class="container mt-4">
        <!-- Aquí se actualizará la lista de productos -->
    </div>
</div>

@yield('content')
<div class="container mt-4">
    <div class="row">
        <div class="table-responsive">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col">Nombre</th>
                        <th scope="col">Descripción</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Categoría</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productos as $producto)
                        <tr>
                            <td>{{ $producto->nombre }}</td>
                            <td>{{ $producto->descripcion }}</td>
                            <td>{{ $producto->precio }}</td>
                            <td>{{ $producto->categoria->nombre }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
    

@endsection