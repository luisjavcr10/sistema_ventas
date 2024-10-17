@extends('layout.layout')

@section('content')

<div class="container mt-4">
    <h1 class="mb-4">Editar datos del empleado</h1>

    @if ($errors->any())
        <div class="alert alert-danger mt-3">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('empleados.update', $empleado->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label for="nombres" class="form-label">Nombre del empleado:</label>
            <div class="input-group input-group-outline">
                <input type="text" class="form-control" id="nombres" name="nombres" value="{{ old('nombres', $empleado->nombres) }}">
            </div> 
        </div>

        <div class="mb-3">
            <label for="DNI" class="form-label">DNI:</label>
            <div class="input-group input-group-outline">
                <input type="text" class="form-control" id="DNI" name="DNI" value="{{ old('DNI', $empleado->DNI) }}">
            </div>     
        </div>

        <div class="mb-3">
            <label for="telefono" class="form-label">Teléfono:</label>
            <div class="input-group input-group-outline">
                <input type="text" class="form-control" id="telefono" name="telefono" value="{{ old('telefono', $empleado->telefono) }}">
            </div>    
        </div>

        <div class="mb-3">
            <label for="email" class="form-label">Correo:</label>
            <div class="input-group input-group-outline">
                <input type="email" class="form-control" id="email" name="email" value="{{ old('email', $empleado->email) }}">
            </div>      
        </div>

        <div class="mb-3">
            <label for="direccion" class="form-label">Dirección:</label>
            <div class="input-group input-group-outline">
                <input type="text" class="form-control" id="direccion" name="direccion" value="{{ old('direccion', $empleado->direccion) }}">
            </div>
            
        </div>

        <button type="submit" class="btn btn-primary">Guardar cambios</button>
        <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

@endsection