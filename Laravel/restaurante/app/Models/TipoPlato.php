<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPlato extends Model
{
    use HasFactory;
    public function platos(){
        //saca todos los platos
        return $this->hasMany(Plato::Class);
    }
}
