<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Equipo;

class Venta extends Model
{
    use HasFactory;
    protected $fillable = ['idequipo', 'fechaventa', 'producto', 'monto'];

    public function equipo()
    {
        return $this->belongsTo(Equipo::class, 'idequipo');
    }
}
