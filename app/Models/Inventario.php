<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Inventario
 *
 * @property $id
 * @property $producto_id
 * @property $existencias
 * @property $entradas
 * @property $salidas
 * @property $created_at
 * @property $updated_at
 *
 * @package App\Models
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Inventario extends Model
{
    protected $table = 'inventarios';

    protected $fillable = ['producto_id', 'existencias', 'entradas', 'salidas'];

    public function producto()
    {
        return $this->belongsTo(Producto::class, 'producto_id');
    }

    public static $rules = [
        'producto_id' => 'required',
        'existencias' => 'required',
        'entradas' => 'required',
        'salidas' => 'required',
    ];

    protected $perPage = 20;
}
