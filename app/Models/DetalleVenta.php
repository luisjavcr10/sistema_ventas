<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleVenta extends Model
{
    use HasFactory;
    protected $table = 'detalleventass';
    public $timestamps = false;

    protected $fillable=['venta_id','idproducto','precio', 'cantidad'];

    public function ventas()
    {
        return $this->hasOne(CabeceraVenta::class, 'venta_id', 'venta_id');
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'idproducto', 'id');
    }
}
