<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class ProductoController extends Controller
{

    public function index(Request $request)
    {
        $categoria_id = $request->input('categoria_id');

        if ($categoria_id) {
            $productos = Producto::where('categoria_id', $categoria_id)->get();
        } else {
            $productos = Producto::all();
        }
        $categorias = Categoria::all();

        return view('productos.inventario.index', compact('productos', 'categorias'));
    }

    public function edit($id) 
    {
        $producto = Producto::findOrFail($id);
        return view('productos.inventario.edit',compact('producto'));
    }

    public function update(Request $request, $id) 
    {
        $producto = Producto::findOrFail($id);
        $producto->update($request->all());
        return redirect()->route('productos.index')->with('success','Información de producto actualizada');
    }

    public function destroy($id)
    {
        Producto::destroy($id);
        return redirect()->route('productos.index')->with('success','Producto eliminado');
    }

    public function buscar(Request $request)
    {
        $query = $request->input('query');
        $producto = Producto::where('nombre', 'like', '%' . $query . '%')
                            ->orWhere('id', $query)
                            ->first();
        return view('productos.inventario.nuevobloque', compact('producto'));
    }

    public function actualizarEmbarque(Request $request)
    {
        $productos = $request->input('productos');
        
        foreach ($productos as $productoData) {
            $producto = Producto::find($productoData['id']);
            if ($producto) {
                $producto->stock = $productoData['stock'];
                $producto->save();
            }
        }

        return redirect()->route('productos.index')->with('success', 'Stock actualizado con éxito.');
    }
}


