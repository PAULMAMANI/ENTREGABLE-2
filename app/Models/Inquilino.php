<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inquilino extends Model
{
    protected $fillable = ['nombre', 'correo_electronico'];

    public function alquileres()
    {
        return $this->hasMany(Alquiler::class);
    }
}
