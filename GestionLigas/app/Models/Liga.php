<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Liga extends Model {
    protected $fillable = ['nombre', 'ciudad', 'categoria'];
    public function equipos() { 
        return $this->hasMany(Equipo::class, 'id_liga'); 
    }
}