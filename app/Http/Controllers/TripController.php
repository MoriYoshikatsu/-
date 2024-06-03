<?php

namespace App\Http\Controllers;

use App\Models\Trip;
use App\Models\SpotTrip;
use App\Models\Parameter;
use App\Models\SpotCategory;
use App\Models\Spot;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class TripController extends Controller
{
	/**
	 * Display a listing of the resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index()
	{
		$spot_categories = SpotCategory::all();
		return view("trip.index")->with(["spot_categories" => $spot_categories]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function create(SpotTrip $spottrip)
	{
		// $parameter = Parameter::where('user_id', Auth::id())->latest("updated_at")->first();
		$trip = Trip::where('user_id', Auth::id())->latest("updated_at")->first();
		// $trip = Trip::where('parameter_id', $parameter->id)->latest("updated_at")->first();
		$wentSpotTrips = SpotTrip::where('trip_id', $trip->id)->where('status', 1)->get();
		// #1#
		// $spottrip = SpotTrip::select('id')->where(['status', 1],['trip_id', '=', $trip->id]);
		// $wentSpotTrips = Spot::whereIn('id', $spottrip);
		// #2#
		// $spotTrips = Spot::whereHas('spot_trip', function ($q) {$q->where('trips.id', 1);})->get();
		// #3#動く
		// $spottrip = SpotTrip::select('id')->where([['status', 1], ['trip_id', '=', $trip->id]])->get();
		// $spotIds = $spottrip->pluck('id')->toArray();
		// $wentSpotTrips = Spot::whereIn('id', $spotIds)->get();
		return view("trip.create")->with(["trip" => $trip, "wentSpotTrips" => $wentSpotTrips]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @return \Illuminate\Http\Response
	 */
	public function store(Request $request, Trip $trip)
	{
		$parameter = Parameter::where('user_id', Auth::id())->latest("updated_at")->first();
		$trip->parameter_id = $parameter->id;
		$trip->title = $request->title;
		$trip->description = $request->description;
		
		$trip->trip_date = $request->trip_date;
		$trip->status = $request->status;
	
		$trip->save();
	
		return redirect('/users/' . Auth::id() . '/trip/index');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  \App\Models\Trip  $trip
	 * @return \Illuminate\Http\Response
	 */
	public function show(Trip $trip)
	{
		//
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  \App\Models\Trip  $trip
	 * @return \Illuminate\Http\Response
	 */
	public function edit(Trip $trip)
	{
		//
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  \Illuminate\Http\Request  $request
	 * @param  \App\Models\Trip  $trip
	 * @return \Illuminate\Http\Response
	 */
	public function update(Request $request, Trip $trip)
	{
		//
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  \App\Models\Trip  $trip
	 * @return \Illuminate\Http\Response
	 */
	public function destroy(Trip $trip)
	{
		//
	}
}