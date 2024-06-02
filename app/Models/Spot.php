<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spot extends Model
{
	use HasFactory;
	protected $fillable = [
		'spot_category_id',
		'name',
		'latitude',
		'longitude',
		'created_at',
		'updated_at',
	];
	
	public function trips(){
		return $this->belongsToMany(Trip::class);
	}
/*	
	public function spot_trips() {
		return $this->hasmany(SpotTrip::class);
	}
*/	
	
	public function spot_category() {
		return $this->belongsTo(SpotCategory::class);
	}
}
