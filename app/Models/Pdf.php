<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pdf extends Model
{
    protected $fillable = ['user_id', 'filename']; // Lista de atributos que se pueden asignar de forma masiva

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
