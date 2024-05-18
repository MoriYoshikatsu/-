<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpotCategory extends Model
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
    
    public function spot()   
    {
        return $this->hasMany(spot::class);
    }
    /*
    public function ()   
    {
        return $this->hasMany(::class);
    }*/
}
