<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Materia;

class ControlMateria extends Model
{
    use HasFactory;
    protected $guarded = [];
    public function materia()
    {
        return $this->hasOne(Materia::class, 'idmaterias', 'idmaterias');
    }
}
