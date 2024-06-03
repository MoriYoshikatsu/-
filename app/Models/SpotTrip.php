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
	
	public function trip(){
		return $this->belongsTo(Trip::class);
	}
	
	public function spot() {
		return $this->belongsTo(Spot::class);
	}

}
