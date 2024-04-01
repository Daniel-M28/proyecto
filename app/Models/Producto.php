<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Producto extends Model
{ protected $table = 'productos';

    protected $fillable = ['titulo', 'precio'];

    public function inventarios()
    {
        return $this->hasMany(Inventario::class, 'producto_id');
    }

    
}
