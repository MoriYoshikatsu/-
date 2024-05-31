<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    /*protected $fillable = [
        'name',
        'selfintro',
        'icon_path',
        'email',
        'password',
    ];
    */
    
    public function trip()   
    {
        return $this->belongsTo(Trip::class);
    }
    /*
    public function ()   
    {
        return $this->hasMany(::class);
    }
    
    public function ()   
    {
        return $this->hasMany(::class);
    }*/
}
