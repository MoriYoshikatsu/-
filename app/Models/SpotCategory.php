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
    
    public function spots()   
    {
        return $this->hasMany(Spot::class);
    }
    
    public function parameters()   
    {
        return $this->hasMany(Parameter::class);
    }
}
