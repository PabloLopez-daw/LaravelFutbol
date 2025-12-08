<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model {
    protected $fillable = ['nombre', 'ciudad', 'presupuesto', 'id_liga'];
    public function liga() { 
        return $this->belongsTo(Liga::class, 'id_liga');
    }
    public function jugadores() { 
        return $this->hasMany(Jugador::class, 'id_equipo'); 
    }
}
