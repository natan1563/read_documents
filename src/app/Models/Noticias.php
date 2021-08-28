<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Noticias extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $fillable = [
        'id',
        'conteudo',
        'subtitulo',
        'fonte',
        'titulo',
        'data_publicacao',
        'url'
    ];
}
