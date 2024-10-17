<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Producto;

class CarritoController extends Controller{

    public function mostrarProductos()
    {
        $productos = Producto::all();
        return view('productos.venta.index', compact('productos'));
    }

    public function agregar(Request $request)
    {
        $productoId = $request->input('producto_id');
        $producto = Producto::find($productoId);

        $carrito = session()->get('carrito', []);

        // Si el producto ya está en el carrito, incrementa la cantidad
        if (isset($carrito[$productoId])) {
            $carrito[$productoId]['cantidad']++;
        } else {
            // Si no está en el carrito, agrégalo
            $carrito[$productoId] = [
                //"id"=>$productoId,
                "nombre" => $producto->nombre,
                "precio" => $producto->precio,
                "cantidad" => 1
            ];
        }

        session()->put('carrito', $carrito);
        
        return redirect()->back()->with('success', 'Producto agregado al carrito!');
    }

    public function mostrar()
    {
        $carrito = session()->get('carrito');
        //dd($carrito);
        return view('productos.venta.mostrar-carrito', compact('carrito'));
    }

    public function eliminar(Request $request)
    {
        $productoId = $request->input('producto_id');
        $carrito = session()->get('carrito');

        if (isset($carrito[$productoId])) {
            unset($carrito[$productoId]);
            session()->put('carrito', $carrito);
        }

        return redirect()->back()->with('success', 'Producto eliminado del carrito!');
    }

    public function cancelar(){
        session()->forget('carrito');
        return redirect()->route('venta.index')
                 ->with('success', 'Venta registrada exitosamente.');
    }
}


