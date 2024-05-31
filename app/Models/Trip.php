<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Trip extends Model
{
	use HasFactory;
	
	protected $fillable = [
		'user_id',
		'title',
		'description',
		'dart_latitude',
		'dart_longitude',
		'trip_date',
		'status',
		'created_at',
		'updated_at',
	];
	
	public function user()
	{
		return $this->belongsTo(User::class);
	}
/*	
	 public function parameter()
	{
		return $this->belongsTo(Parameter::class);
	}
*/	
	public function spot_trips()   
	{
		return $this->hasMany(SpotTrip::class);
	}
	
	public function likes()   
	{
		return $this->hasMany(Like::class);
	}
	
	public function images() 
	{
		return $this->hasmany(Image::class);
	}
}
