<?php

namespace App\Http\Controllers;

use Exception;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Barryvdh\DomPDF\Facade\Pdf;

use App\Models\CabeceraVenta;
use App\Models\DetalleVenta;
use App\Models\Tipo;
use App\Models\Cliente;
use App\Models\Producto;




class VentaController extends Controller
{

    public function mostrarHistorial(){
        $ventas = CabeceraVenta::all();
        return view('productos.venta.historial.index',compact('ventas'));
    }

    public function crear()
    {
        $clientes = Cliente::all();
        $carrito = session('carrito', []);  // Obtiene el carrito de la sesión
        $total = 0;
        $productos = [];

        foreach ($carrito as $productoId => $detallesProducto) {
            $producto = Producto::find($productoId);
            if ($producto) {
                $productos[] = [
                    'producto' => $producto,
                    'cantidad' => $detallesProducto['cantidad'],
                ];
                $total += $producto->precio * $detallesProducto['cantidad'];
            }
        }

        $tipos = Tipo::all();

        return view('productos.venta.registrar', compact('clientes', 'tipos', 'productos', 'total'));
    }

    

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nombres' => 'required|string|max:255',
            'dni' => 'required|string|size:8|unique:clientes,dni',
            'email' => 'required|email|max:255|unique:clientes,email',
            'total' => 'required|numeric|min:0',  // Validación del total
        ]);

        $carrito = session('carrito', []);

        if (empty($carrito)) {
            throw new Exception('El carrito está vacío.');
        }

        try
        {
            DB::beginTransaction();

            // Crear el cliente
            $cliente = new Cliente();
            $cliente->nombres = $validatedData['nombres'];
            $cliente->DNI = $validatedData['dni'];
            $cliente->email = $validatedData['email'];
            $cliente->save();

            // Crear la venta
            $venta = new CabeceraVenta();
            $venta->cliente_id = $cliente->id;
            $venta->nrodoc = '1000011';
            $venta->tipo_id = $request->tipo_id;

            // Formatear la fecha
            $arr = explode('/', $request->fecha);
            $nFecha = $arr[2] . '-' . $arr[1] . '-' . $arr[0];
            $venta->fecha_venta = $nFecha;

            // Obtener el total del request
            $total = (float) $request->total;

            // Calcular el subtotal e IGV
            if ($request->seltipo == '2') {
                $venta->total = $total;
                $venta->subtotal = 0;
                $venta->igv = 0;
            } else {
                $venta->total = $total;
                $venta->subtotal = $total - ($total * 0.18);
                $venta->igv = $total * 0.18;
            }

            $venta->estado = '1';
            $venta->save();

            // Crear los detalles de la venta
            foreach ($carrito as $productoId => $detallesProducto) {
                $detalle = new DetalleVenta();
                $detalle->venta_id = $venta->venta_id;
                $detalle->idproducto = $productoId;
                $detalle->cantidad = $detallesProducto['cantidad'];
                $detalle->precio = (float)$detallesProducto['precio'];
                $detalle->save();
            }

            DB::commit();
            session()->forget('carrito');

            return redirect()->route('venta.detalle', ['venta_id' => $venta->venta_id])
                            ->with('success', 'Venta registrada exitosamente.');
        } 
        catch (\Exception $e) 
        {
            DB::rollback();
            return back()->with('error', 'Ocurrió un error durante la transacción: ' . $e->getMessage());
        }
}


    public function detalle($venta_id){
        $venta=CabeceraVenta::where('venta_id',$venta_id)->first();
        $detalles=DetalleVenta::where('venta_id',$venta_id)->get();
        return view('productos.venta.detalle-venta',compact('venta','detalles'));
    }

    public function visualizar($venta_id)
    {
        $venta = CabeceraVenta::with('detalleventas.producto', 'tipo', 'cliente')->findOrFail($venta_id);

        $view = $venta->tipo->descripcion == 'FACTURA' ? 'productos.venta.factura_pdf' : 'productos.venta.boleta_pdf';

        $pdf = PDF::loadView($view, compact('venta'));

        $path = $venta->tipo->descripcion == 'FACTURA' ? 'public/facturas/' : 'public/boletas/';
        $filename = $venta->tipo->descripcion . '_' . $venta->venta_id . '.pdf';

        Storage::put($path . $filename, $pdf->output());

        return $pdf->stream($filename);
    }

}
