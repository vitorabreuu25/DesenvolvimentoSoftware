<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historico extends Model
{
    public $timestamps = false;
    protected $table = 'historicos';
    protected $fillable = [
        'id',
        'dt_historico',
        'id_evento',
        'st_mensagem',
        'id_usuario'
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