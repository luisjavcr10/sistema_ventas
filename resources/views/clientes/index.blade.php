@extends('layout.layout')

@section('content')

<div class="container mt-4">
    <h1 class="mb-4 text-center">Lista de Clientes</h1>
    <div class="d-flex justify-content-center mb-4 gap-2 p-2"
        <form method="GET" action="{{ route('clientes.index') }}" class="d-flex align-items-center">
            <div class="d-flex justify-content-center mb-3">
                <div class="input-group input-group-outline">
                    <input type="text" name="search" class="form-control me-2" placeholder="Buscar cliente" value="{{ request('search') }}">
                </div>
                <div>
                    <button type="submit" class="btn btn-primary me-2 ">Buscar</button>
                    @if(request('search'))
                        <a href="{{ route('clientes.index') }}" class="btn btn-secondary">Regresar</a>
                    @endif
                </div> 
            </div>
              
        </form>
    </div>

    <!-- Tabla de clientes -->
    <div class="table-responsive">
        <table class="table table-light table-striped">
            <thead class="table-danger">
                <tr>
                    <th scope="col">DNI</th>
                    <th scope="col">Nombre del cliente</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Opciones</th>
                </tr>       
            </thead>
            <tbody>
                @foreach($clientes as $cliente)
                <tr>
                    <td>{{ $cliente->DNI }}</td>
                    <td>{{ $cliente->nombres }}</td>
                    <td>{{ $cliente->telefono }}</td>
                    <td>{{ $cliente->email }}</td>
                    <td>
                        <a href="{{ route('clientes.edit', $cliente->id) }}" class="btn btn-success btn-sm me-2">Editar</a>
                        <form action="{{ route('clientes.destroy', $cliente->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este cliente?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Paginación -->
    <div class="d-flex justify-content-center mt-4">
        {{ $clientes->links() }}
    </div>
</div>

@endsection