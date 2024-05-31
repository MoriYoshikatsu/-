<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Follow extends Model
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
    
    public function user()
    {
        return $this->belongsTo(User::class);
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
    
    public function ()   
    {
        return $this->hasMany(::class);
    }*/
}
