<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'plate',
        'brand',
        'model',
        'idUsuario'
    ];

    function user(){
        return $this->belongsTo('App/Models/User','idUsuario');
    }

}
