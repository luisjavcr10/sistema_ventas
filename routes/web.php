<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductoController;
use App\Http\Controllers\CarritoController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\VentaController;
use App\Models\Producto;


//AUTENTIFICACIÓN
Route::get('/', function () {
    $productos = Producto::all();
    return view('productos.venta.index', compact('productos'));
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    //TABLA CLIENTES
    Route::get('/clientes',[ClienteController::class,'index'])->name('clientes.index');
    Route::get('/clientes/{cliente}/edit', [ClienteController::class, 'edit'])->name('clientes.edit');
    Route::put('/clientes/{cliente}', [ClienteController::class, 'update'])->name('clientes.update');
    Route::delete('/clientes/{cliente}', [ClienteController::class, 'destroy'])->name('clientes.destroy');

    //TABLA EMPLEADOS
    Route::get('/empleados',[EmpleadoController::class,'index'])->name('empleados.index');
    Route::get('/empleados/{empleado}/edit',[EmpleadoController::class,'edit'])->name('empleados.edit');
    Route::put('/empleados/{empleado}',[EmpleadoController::class,'update'])->name('empleados.update');
    Route::delete('/empleados/{empleado}',[EmpleadoController::class,'destroy'])->name('empleados.destroy');

    //INVENTARIO
    Route::get('/productos', [ProductoController::class, 'index'])->name('productos.index');
    Route::get('/productos/buscar', [ProductoController::class, 'buscar'])->name('productos.buscar');
    Route::post('/productos/actualizarembarque', [ProductoController::class, 'actualizarEmbarque'])->name('productos.actualizarembarque');

    Route::get('/productos/categoria/{categoria}', [ProductoController::class, 'filterByCategory'])->name('productos.filterByCategory');
    Route::get('/productos/{producto}/edit',[ProductoController::class,'edit'])->name('productos.edit');
    Route::put('/productos/{producto}',[ProductoController::class,'update'])->name('productos.update');
    Route::delete('/producto/{producto}',[ProductoController::class,'destroy'])->name('productos.destroy');
    
    Route::get('/productos/nuevobloque',[ProductoController::class,'nuevobloque'])->name('productos.nuevobloque');

    //VENTA
    Route::get('/venta', [CarritoController::class, 'mostrarProductos'])->name('venta.index');
    Route::post('/carrito/agregar', [CarritoController::class, 'agregar'])->name('carrito.agregar');
    Route::get('/carrito', [CarritoController::class, 'mostrar'])->name('carrito.mostrar');
    Route::post('/carrito/eliminar', [CarritoController::class, 'eliminar'])->name('carrito.eliminar');

    //HISTORIAL DE VENTAS
    Route::get('/historial-ventas',[VentaController::class,'mostrarHistorial'])->name('ventas.index');
    
    Route::get('/ventas/crear', [VentaController::class, 'crear'])->name('ventas.crear');
    Route::post('/ventas', [VentaController::class, 'store'])->name('ventas.store');
    Route::get('/ventas/{venta_id}/detalle', [VentaController::class, 'detalle'])->name('venta.detalle');
    Route::get('/ventas/{venta_id}/visualizar', [VentaController::class, 'visualizar'])->name('venta.visualizar');
    //Route::get('/')
    
    //Route::get('/EncontrarProducto/{idproducto}', [VentaController::class,'ProductoCodigo']);
    Route::get('/EncontrarTipo/{tipo_id}', [VentaController::class,'PorTipo']);

    Route::get('/cancelar',[CarritoController::class,'cancelar'])->name('carrito.cancelar');
});

require __DIR__.'/auth.php';






