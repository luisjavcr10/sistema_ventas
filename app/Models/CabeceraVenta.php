<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CabeceraVenta extends Model
{
    use HasFactory;

    protected $table = 'cabeceraventas';

    protected $primaryKey = 'venta_id';
    public $timestamps = false;
    //public $incrementing = true;

    protected $fillable = [
        'cliente_id',
        'nrodoc',
        'tipo_id',
        'fecha_venta',
        'total',
        'subtotal',
        'igv',
        'estado',
    ];

    // Define los atributos que deberían ser convertidos a tipo fecha
    protected $dates = [
        'fecha_venta',
    ];

    // Define las relaciones
    public function cliente()
    {
        return $this->belongsTo(Cliente::class, 'cliente_id', 'id');
    }

    public function tipo()
    {
        return $this->belongsTo(Tipo::class, 'tipo_id', 'tipo_id');
    }

    public function detalleventas()
    {
        return $this->hasMany(DetalleVenta::class, 'venta_id','venta_id');
    }
}

