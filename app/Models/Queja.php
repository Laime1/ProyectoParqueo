<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Queja extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'codigo_sis', 'descripcion'
    ];
}
