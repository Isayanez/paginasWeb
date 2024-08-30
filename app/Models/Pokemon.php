<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pokemon extends Model
{
    use HasFactory;
    protected $fillable = ['nombre', 'url_imagen', 'hp', 'defensa',
    'ataque', 'rapidez', 'tipo_id'];
}
