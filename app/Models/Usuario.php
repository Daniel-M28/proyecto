<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Traits\HasRoles;

/**
 * Class Usuario
 *
 * @property $id
 * @property $Nombre
 * @property $CorreoElectronico
 * @property $Telefono
 * @property $created_at
 * @property $updated_at
 *
 * @package App
 * @mixin \Illuminate\Database\Eloquent\Builder
 */
class Usuario extends Model
{
    use HasRoles;

    public static $rules = [
        'Nombre' => 'required|string|max:255',
        'CorreoElectronico' => 'required|email|unique:usuarios,CorreoElectronico',
        'Telefono' => 'required|string|max:10',
       
    ];

    protected $perPage = 20;

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['Nombre', 'CorreoElectronico', 'Telefono'];

}
