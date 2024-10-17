@extends('layout.layout')

@section('content')

<div class="container mt-4">
    <h1 class="mb-4 text-center">Lista de Empleados</h1>
    <div class="d-flex justify-content-center mb-4 gap-2 p-2">

        <form method="GET" action="{{ route('empleados.index') }}" class="d-flex align-items-center">

            <div class="d-flex justify-content-center mb-3">

                <div class="input-group input-group-outline">
                    <input type="text" name="search" class="form-control me-2" placeholder="Buscar empleado" value="{{ request('search') }}">
                </div>
                
                <div>
                    <button type="submit" class="btn btn-primary me-2 ">Buscar</button>
                    @if(request('search'))
                        <a href="{{ route('empleados.index') }}" class="btn btn-secondary">Regresar</a>
                    @endif
                </div> 
            </div>
              
        </form>
    </div>

    <!-- Tabla de empleados -->
    <div class="table-responsive">
        <table class="table table-light table-striped">
            <thead class="table-danger">
                <tr>
                    <th scope="col">DNI</th>
                    <th scope="col">Nombre del empleado</th>
                    <th scope="col">Teléfono</th>
                    <th scope="col">Correo</th>
                    <th scope="col">Horario</th>
                    <th scope="col">Opciones</th>
                </tr>       
            </thead>
            <tbody>
                @foreach($empleados as $empleado)
                <tr>
                    <td>{{ $empleado->DNI }}</td>
                    <td>{{ $empleado->nombres }}</td>
                    <td>{{ $empleado->telefono }}</td>
                    <td>{{ $empleado->email }}</td>
                    <td>{{ $empleado->horario}}</td>
                    <td>
                        <a href="{{ route('empleados.edit', $empleado->id) }}" class="btn btn-success btn-sm me-2">Editar</a>
                        <form action="{{ route('empleados.destroy', $empleado->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-primary btn-sm" onclick="return confirm('¿Estás seguro de que deseas eliminar este empleado?')">Eliminar</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div class="d-flex justify-content-center mt-4">
        {{ $empleados->links() }}
    </div>
</div>

@endsection