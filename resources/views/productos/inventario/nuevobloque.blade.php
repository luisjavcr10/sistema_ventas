@extends('layout.layout')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 text-center">Añadir Embarque</h1>

    <!-- Formulario de Búsqueda de Producto -->
    <form action="{{ route('productos.buscar') }}" method="GET" class="mb-4">
        <input type="text" name="query" class="form-control" placeholder="Buscar producto por nombre o ID" required>
        <button type="submit" class="btn btn-primary mt-2">Buscar</button>
    </form>

    @isset($producto)
    <!-- Mostrar el producto encontrado -->
    <div class="mb-4">
        <h3>Producto encontrado:</h3>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Stock Actual</th>
                    <th>Acción</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>{{ $producto->id }}</td>
                    <td>{{ $producto->nombre }}</td>
                    <td>{{ $producto->stock }}</td>
                    <td>
                        <button type="button" class="btn btn-info" onclick="addToEmbarque('{{ $producto->id }}', '{{ $producto->nombre }}', '{{ $producto->stock }}')">Agregar</button>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
    @endisset

    <!-- Lista de productos seleccionados para actualizar stock -->
    <h3>Productos seleccionados para el embarque:</h3>
    <form id="embarque-form" action="{{ route('productos.actualizarembarque') }}" method="POST">
        @csrf
        <div id="selected-products"></div>
        <button type="submit" class="btn btn-success mt-4">Actualizar Stock</button>
    </form>
</div>

<!-- Script para agregar productos a la lista y usar localStorage -->
<script>
    const selectedProductsDiv = document.getElementById('selected-products');

    // Función para agregar productos a la lista y al localStorage
    function addToEmbarque(id, nombre, stock) {
        // Crea el objeto del producto
        const product = {
            id: id,
            nombre: nombre,
            stock: stock
        };

        // Recupera los productos almacenados en localStorage
        let selectedProducts = JSON.parse(localStorage.getItem('selectedProducts')) || [];

        // Verifica si el producto ya está en la lista
        const existingProduct = selectedProducts.find(p => p.id === id);
        if (!existingProduct) {
            selectedProducts.push(product);
            localStorage.setItem('selectedProducts', JSON.stringify(selectedProducts));
            renderSelectedProducts();  // Vuelve a renderizar la lista de productos
        } else {
            alert('Este producto ya está en la lista de embarque.');
        }
    }

    // Función para renderizar los productos seleccionados desde localStorage
    function renderSelectedProducts() {
        selectedProductsDiv.innerHTML = ''; // Limpia la lista actual
        const selectedProducts = JSON.parse(localStorage.getItem('selectedProducts')) || [];

        selectedProducts.forEach(product => {
            const productDiv = document.createElement('div');
            productDiv.className = "form-group mb-3";
            productDiv.innerHTML = `
                <label>${product.nombre} (ID: ${product.id})</label>
                <input type="hidden" name="productos[${product.id}][id]" value="${product.id}">
                <input type="number" name="productos[${product.id}][stock]" value="${product.stock}" class="form-control" min="0">
            `;
            selectedProductsDiv.appendChild(productDiv);
        });
    }

    // Cargar productos seleccionados al recargar la página
    document.addEventListener('DOMContentLoaded', renderSelectedProducts);
</script>
@endsection
