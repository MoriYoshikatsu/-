<?php

namespace App\Http\Controllers;

use App\Models\Spot;
use App\Models\Trip;
use App\Models\SpotTrip;
use App\Models\User;
use App\Models\Parameter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpotController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		//
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create()
	{
		//
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function create_spots(Request $request, Trip $trip, Parameter $parameter)
	{
		// spotをcreate
		$spots = $request->input('spot');
		$spotIds = [];      // spot_idの配列
		
		foreach ($spots as $spot) {
			if (isset($spot['selected'])) {
				$newSpot = new Spot();
				$newSpot->spot_category_id = $spot['spot_category_id'];
				$newSpot->name = $spot['name'];
				$newSpot->latitude = $spot['latitude'];
				$newSpot->longitude = $spot['longitude'];
				$newSpot->save();
				
				// 今作ったspotのidを持っておく
				array_push($spotIds, $newSpot->id);
			}
		}
		
		$parameter_input = $request['parameter'];
		// dd($parameter_input);
		$parameter = Parameter::where('id', $parameter->id)->first();
		$parameter->fill($parameter_input)->save();
		
		// Tripリストをcreate
		$trip = new Trip();
		$trip->user_id = Auth::id();
		$trip->parameter_id = $request['parameter_id'];
		$trip->title = "タイトル";
		$trip->description = "詳細";
		$trip->trip_date = null;
		$trip->status = 0;
		$trip->save();
		
		foreach($spotIds as $spotId) {
			$trip->spots()->attach($spotId, ['status' => 0, 'created_at' => now(), 'updated_at' => now()]);
			// $spotTrip = new SpotTrip();
			// $spotTrip->spot_id = $spotId;
			// $spotTrip->trip_id = $trip->id;
			// $spotTrip->status = 0;
			// $spotTrip->save();
		}
		
		return redirect('/users/' . Auth::id() . '/trip/'. $trip->id . '/list');
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Spot  $spot
	 * @return \Illuminate\Http\Response
	 */
	public function show(Spot $spot)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Spot  $spot
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Spot $spot)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Spot  $spot
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Spot $spot)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Spot  $spot
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Spot $spot)
	{
		//
	}
}