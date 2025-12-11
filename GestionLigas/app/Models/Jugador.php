<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Jugador extends Model {
    protected $table = 'jugadores';
    protected $fillable = ['nombre', 'apellido1', 'dni', 'edad', 'goles', 'id_equipo', 'foto'];
    public function equipo() { 
        return $this->belongsTo(Equipo::class, 'id_equipo'); 
    }
}
