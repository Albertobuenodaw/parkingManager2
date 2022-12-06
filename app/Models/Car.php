<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    function user(){
        return $this->belongsTo('App/Models/User');
    }
    protected $fillable = [
        'plate',
        'brand',
        'model',
    ];



}
