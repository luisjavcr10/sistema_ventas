<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Empleado;

class EmpleadoController extends Controller
{

    public function index(Request $request)
    {
        $search= $request->input('search');

        $empleados= Empleado::query()
            ->when($search,function($query,$search){
                return $query->where('DNI', 'like', "%{$search}%")
                            ->orWhere('nombres', 'like', "%{$search}%")
                            ->orWhere('telefono', 'like', "%{$search}%")
                            ->orWhere('email', 'like', "%{$search}%");
            })->paginate(10);
        return view('empleados.index',compact('empleados'));

    }

    public function edit(Empleado $empleado)
    {
        return view('empleados.edit',compact('empleado'));
    }

    public function update(Request $request, $id)
    {
        $empleado = Empleado::findOrFail($id);
        $empleado->update($request->all());
        return redirect()->route('empleados.index')->with('success','Información de empleado actualizada');
    }

    public function destroy(string $id)
    {
        Empleado::destroy($id);
        return redirect()->route('empleados.index')->with('success','Empleado eliminado');
    }
    
}
