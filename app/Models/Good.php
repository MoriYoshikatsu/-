<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Good extends Model
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
    
    public function appuser()
    {
        return $this->belongsTo(appuser::class);
    }
    
    public function trip()   
    {
        return $this->belongsTo(trip::class);
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
