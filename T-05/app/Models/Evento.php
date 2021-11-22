<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Evento extends Model
{
    public $timestamps = false;
    protected $table = 'eventos';
    protected $fillable = [
        'id',
        'st_nome',
        'st_descricao',
        'st_image',
        'st_categoria',
        'dt_criacao',
        'dt_evento',
        'vl_preco'
    ];
    
    public static function boot()
    {
        parent::boot();
    
        static::saving(function ($instance) {
            
        });
    
        static::saved(function ($instance) {
            
        });
    }
}