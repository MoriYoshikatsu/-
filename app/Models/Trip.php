<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
    use HasFactory;
    /*
    protected $fillable = [
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
    /*
    public function spot_trip()   
    {
        return $this->hasMany(spot_trip::class);
    }
    
    public function good()   
    {
        return $this->hasMany(good::class);
    }
    /*
    public function ()   
    {
        return $this->hasMany(::class);
    }
    
    public function ()   
    {
        return $this->hasMany(::class);
    }
    */
}
