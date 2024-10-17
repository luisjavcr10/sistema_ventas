@extends('layout.layout')

@section('content')
<div class="container">
    <h1>Registrar Venta</h1>

    <div>
        <form action="{{ route('ventas.store') }}" method="POST">
            @csrf
            <div class="row">
                <!-- Fecha de la Venta -->
                <div class="col-md-1">
                    <label for="fecha">Fecha</label>
                </div>
                <div class="col-md-2">
                    <div class="form-group">
                        <div class="input-group date">
                            <input type="text" id="fecha" name="fecha" class="form-control" value="{{ Carbon\Carbon::now()->format('d/m/Y') }}" required>
                            <div class="input-group-append">
                                <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Tipo de Documento -->
                <div class="col-md-1">
                    <label for="tipo_id">Tipo</label>
                </div>
                <div class="col-md-2">
                    <select class="form-control" id="tipo_id" name="tipo_id" required>
                        <option value="" selected disabled>- Seleccione un tipo -</option>
                        @foreach($tipos as $itemtipos)
                            <option value="{{ $itemtipos['tipo_id'] }}">{{ $itemtipos['descripcion'] }}</option>
                        @endforeach
                    </select>
                </div>

                <!-- Formulario de Cliente -->
                <div class="col-md-12 pt-3">
                    <h4>Datos del Cliente</h4>
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nombres">Nombres del Cliente</label>
                                <input type="text" id="nombres" name="nombres" class="form-control" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="dni">DNI del Cliente</label>
                                <input type="text" id="dni" name="dni" class="form-control" maxlength="8" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="email">Email del Cliente</label>
                                <input type="email" id="email" name="email" class="form-control" required>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Fin del Formulario de Cliente -->
            </div>

            <!-- Tabla de Productos del Carrito -->
            <div class="col-md-12 pt-3">
                <h4>Carrito de Productos</h4>
                <div class="table-responsive">
                    <table class="table table-striped table-bordered table-condensed table-hover">
                        <thead class="thead-default" style="background-color:#3c8dbc;color: #fff;">
                            <tr>
                                <th>Nombre</th>
                                <th>Descripción</th>
                                <th>Precio Unitario</th>
                                <th>Cantidad</th>
                                <th>Subtotal</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($productos as $detalle)
                                <tr>
                                    <td>{{ $detalle['producto']->nombre }}</td>
                                    <td>{{ $detalle['producto']->descripcion }}</td>
                                    <td>S/ {{ number_format($detalle['producto']->precio, 2) }}</td>
                                    <td>{{ $detalle['cantidad'] }}</td>
                                    <td>S/ {{ number_format($detalle['producto']->precio * $detalle['cantidad'], 2) }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No hay productos en el carrito</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>

            <!-- Total -->
            <div class="row pt-3">
                <div class="col-md-2">
                    <h2>Total: S/. </h2>
                    <label class="fs-6 p-2 text-primary bg-light border rounded shadow-sm" for="total">
                       {{ number_format($total, 2) }}
                    </label>
                </div>
            </div>

            <!-- Campo oculto para el total -->
            <input type="hidden" id="total" name="total" value="{{ $total }}">

            <!-- Botones de Guardar y Cancelar -->
            <div class="col-md-12 text-center pt-4">
                <div class="form-group">
                    <button class="btn btn-primary" type="submit" id="btnRegistrar">
                        Registrar
                    </button>
                    <a href="{{ route('carrito.cancelar') }}" class="btn btn-danger">
                        Cancelar
                    </a>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
