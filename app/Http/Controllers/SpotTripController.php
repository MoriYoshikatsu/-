<?php

namespace App\Http\Controllers;

use App\Models\SpotTrip;
use App\Models\Trip;
use App\Models\Spot;
use App\Models\Parameter;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SpotTripController extends Controller
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
	// spotテーブルを直接参照して，そのあとtripテーブルiDで絞込
	// 行く予定だったspotを行ったかどうかを更新するview
	public function create(Request $request, Parameter $parameter)
	{
		$trip = Trip::where('user_id', Auth::id())->latest("updated_at")->first();
		$parameter = Parameter::latest("updated_at")->first();
		$spotTrips = SpotTrip::where('trip_id', $trip->id)->get();
		// $id = $request->route('trip');
		// $spotTrips = Spot::whereHas('trips', function ($q) use($id) {$q->where('trips.id', '=', $id);})->get();
		// dd($spots);
		return view("trip.list")->with(["spotTrips" => $spotTrips, "trip" => $trip]);
	}
	// spot_tripで行ったかどうかを更新
	public function store_status(Request $request)
	{
		$spotIds = $request['spots'];
		$trip = Trip::where('user_id', Auth::id())->latest("updated_at")->first();
		// dd($spotIds);
		foreach($spotIds as $spotId) {
			// $trip->spots()->attach($spotId, ['status' => 1, 'updated_at' => now()]);
			$spotTrip = SpotTrip::where('spot_id', $spotId)->first();
			$spotTrip->status = 1;
			$spotTrip->save();
			
			$tripId = $spotTrip->trip_id;
		}
		return redirect('/users/' . Auth::id() . '/trip/' . $trip->id . '/create');
	}
	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Spot_trip  $spot_trip
	 * @return \Illuminate\Http\Response
	 */
	public function show(Spot_trip $spot_trip)
	{
		//
	}
	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Spot_trip  $spot_trip
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Spot_trip $spot_trip)
	{
		//
	}
	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Spot_trip  $spot_trip
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Spot_trip $spot_trip)
	{
		//
	}
	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Spot_trip  $spot_trip
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Spot_trip $spot_trip)
	{
		//
	}
}