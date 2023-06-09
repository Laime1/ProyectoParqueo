<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Clientes extends Model
{
    use HasFactory;
    public $timestamps = false;
   // protected $primaryKey = "CodigoSIS";
    protected $fillable = ['Nombre', 'Apellido', 'CodigoSIS', 'Placa', 'Vehiculo'];

}
