<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UsuarioFoto extends Model
{
    use HasFactory;

    protected $fillable = [
        'usuario_id',
        'foto_caminho'
    ];
}
