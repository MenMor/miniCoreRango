<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Venta;

class Equipo extends Model
{

    use HasFactory;
    protected $table = 'equipo';

    protected $fillable = ['nombreEquipo'];


    public function ventas()
    {
        return $this->hasMany(Venta::class, 'idequipo');
    }

}