<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Compra extends Model
{
    public $timestamps = false;
    protected $table = 'compras';
    protected $fillable = [
        'id',
        'st_rg',
        'id_evento',
        'dt_compra',
        'vl_preco',
        'dt_estorno'
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