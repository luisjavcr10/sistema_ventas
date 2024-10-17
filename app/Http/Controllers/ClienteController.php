<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

use App\Models\Cliente;


class ClienteController extends Controller
{
    public function index(Request $request)
    {
        $search = $request->input('search');
        
        $clientes = Cliente::query()
            ->when($search, function ($query, $search) {
                return $query->where('DNI', 'like', "%{$search}%")
                             ->orWhere('nombres', 'like', "%{$search}%")
                             ->orWhere('telefono', 'like', "%{$search}%")
                             ->orWhere('email', 'like', "%{$search}%");
            })->paginate(10);

        return view('clientes.index', compact('clientes'));
    }

    public function edit(Cliente $cliente)
    {
        return view('clientes.edit',compact('cliente'));
    }

    public function update(Request $request, $id)
    {
        $cliente = Cliente::findOrFail($id);
        $cliente->update($request->all());
        return redirect()->route('clientes.index')->with('success','Información de cliente actualizada');
    }

    public function destroy($id)
    {
        Cliente::destroy($id);
        return redirect()->route('clientes.index')->with('success','Cliente eliminado');
    }
    
}
