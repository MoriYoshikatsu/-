<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Parameter extends Model
{
	use HasFactory;
	protected $fillable = [
/*		'user_id',*/
		'spot_category_id',
		'departure_latitude',
		'departure_longitude',
		'trip_time',
		'transportation',
		'dart_latitude',
		'dart_longitude',
		'created_at',
		'updated_at',
	];
	
/*	public function user() {
		return $this->belongsTo(User::class);
	}
*/	
	public function trip()
	{
		return $this->belongsTo(Trip::class);
	}
	
	public function spot_category()
	{
		return $this->belongsTo(SpotCategory::class);
	}
}
