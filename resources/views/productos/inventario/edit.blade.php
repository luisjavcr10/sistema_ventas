@extends('layout.layout')

@section('content')
<div class="container mt-4">
    <h1 class="mb-4">Editar datos del producto</h1>

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('productos.update', $producto->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombres" class="form-label">Nombre del producto:</label>
            <div class="input-group input-group-outline">
                <input type="text" class="form-control" id="nombres" name="nombres" value="{{ old('nombres', $producto->nombre) }}">
            </div> 
        </div>

        <div class="mb-3">
            <label for="descripcion" class="form-label">Descripcion:</label>
            <div class="input-group input-group-outline">
                <input type="text" class="form-control" id="descripcion" name="descripcion" value="{{ old('descripcion', $producto->descripcion) }}">
            </div>     
        </div>

        <div class="mb-3">
            <label for="stock" class="form-label">Stock:</label>
            <div class="input-group input-group-outline">
                <input type="text" class="form-control" id="telefono" name="stock" value="{{ old('stock', $producto->stock) }}">
            </div>    
        </div>

        <div class="mb-3">
            <label for="precio" class="form-label">Precio en soles:</label>
            <div class="input-group input-group-outline">
                <input type="precio" class="form-control" id="precio" name="precio" value="{{ old('precio', $producto->precio) }}">
            </div>      
        </div>

        

        <button type="submit" class="btn btn-primary">Guardar cambios</button>
        <a href="{{ route('productos.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>
@endsection