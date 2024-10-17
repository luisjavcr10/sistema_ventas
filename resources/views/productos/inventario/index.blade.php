@extends('layout.layout')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4 font-weight-bold text-center">Lista de Productos</h1>

    <!-- Formulario para seleccionar categoría y filtrar -->

    <div class="d-flex justify-content-center mb-4 gap-2 p-2">
        <div>
            <form id="filter-form" action="{{ route('productos.index') }}" method="GET" class="d-flex">
                <select id="category-select" name="categoria_id" class="form-select w-auto me-2 p-2">
                    <option value="" {{ request('categoria_id') == '' ? 'selected' : '' }}>Todo</option>
                    @foreach($categorias as $categoria)
                        <option value="{{ $categoria->id }}" {{ request('categoria_id') == $categoria->id ? 'selected' : '' }}>
                            {{ $categoria->nombre }}
                        </option>
                    @endforeach
                </select>
                <button type="submit" class="btn btn-primary p-2">Filtrar</button>
            </form>
        </div>
        <div>
        <a href="{{ route('productos.buscar') }}" class="btn btn-dark p-2">Añadir embarque</a>
        </div>
    </div>

    <div class="row">
        <div class="table-responsive">
            <table class="table table-light table-striped">
                <thead class="table-danger">
                    <tr>
                        <th scope="col" class="text-center">ID</th>
                        <th scope="col" class="text-center">Nombre</th>
                        <th scope="col" class="text-center">Categoria</th>
                        <th scope="col" class="text-center">Precio (S/.)</th>
                        <th scope="col" class="text-center">Stock</th>
                        <th scope="col" class="text-center">Opciones</th>
                    </tr>
                </thead>
                <tbody class="table-group-divider ">
                    @foreach($productos as $producto)
                        <tr>
                            <th scope="row" class="text-center">{{ $producto->id }}</th>
                            <td class="text-center">{{ $producto->nombre }}</td>
                            <td class="text-center">{{ $producto->categoria->nombre }}</td>
                            <td class="text-center">{{ $producto->precio }}</td>
                            <td class="text-center">{{ $producto->stock }}</td>
                            <td class=" ">
                                <a href="{{route('productos.edit',$producto->id)}}"  class="btn btn-success btn-sm me-2">Editar</a>
                                <form action="{{ route('productos.destroy',$producto->id) }}" method="POST" style="display:inline;">
                                    <button type="submit" class="btn btn-primary btn-sm"onclick="return confirm('¿Estás seguro de que deseas eliminar este producto?')" >Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>

            </table>
            
        </div>
    </div>
</div>
@endsection