<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SpotTrip extends Model
{
	use HasFactory;
	protected $fillable = [
		'spot_id',
		'trip_id',
		'status',
		'created_at',
		'updated_at',
	];
/*	
	public function trips(){
		return $this->belongsToMany(Trip::class);
	}
	
	public function spots() {
		return $this->belongsToMany(Spot::class);
	}
*/
}
