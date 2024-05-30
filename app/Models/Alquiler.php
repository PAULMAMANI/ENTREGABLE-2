<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Alquiler extends Model
{
    protected $fillable = ['monto', 'fecha_inicio', 'departamento_id', 'inquilino_id'];
    protected $table = 'alquileres';

    public function departamento()
    {
        return $this->belongsTo(Departamento::class);
    }

    public function inquilino()
    {
        return $this->belongsTo(Inquilino::class);
    }
}

    
