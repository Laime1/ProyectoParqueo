<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Queja extends Model
{
    protected $fillable = [
        'codigo_sis', 'descripcion'
    ];
}
