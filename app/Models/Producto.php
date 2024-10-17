<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;
    protected $table = 'productos';
    protected $primaryKey = 'id';
    public $timestamps=false;
    protected $fillable = ['nombre', 'descripcion', 'precio', 'stock', 'fecha_vencimiento', 'categoria_id'];

    // Relación con la categoría
    public function categoria()
    {
        return $this->belongsTo(Categoria::class,'categoria_id','id');
    }
}
