<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    use HasFactory;
    protected $table = 'clientes';
    protected $primaryKey = 'id';
    public $timestamps = false;

    protected $fillable = [
        'nombres',
        'DNI',
        'direccion',
        'fecha_de_nacimiento',
        'email',
        'telefono',
    ];

    public function ventas()
    {
        return $this->hasMany(CabeceraVenta::class,'cliente_id','id');
    }
}
