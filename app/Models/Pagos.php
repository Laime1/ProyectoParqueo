<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pagos extends Model
{
    public $timestamps = false;
    protected $fillable = ['CodigoSIS','Monto', 'pago_desde', 'pago_hasta','estado_pago'];
}
