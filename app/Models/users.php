<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class users extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'selfintro',
        'email',
        'password',
        'icon_path',
    ];
    
    /*public function ()   
    {
        return $this->hasMany(::class);
    }
    
    public function ()   
    {
        return $this->hasMany(::class);
    }
    
    public function ()   
    {
        return $this->hasMany(::class);
    }
    
    public function ()   
    {
        return $this->hasMany(::class);
    }*/
}
