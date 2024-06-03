<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\FollowController;
use App\Http\Controllers\TripController;
use App\Http\Controllers\GoodController;
use App\Http\Controllers\ImageController;
use App\Http\Controllers\SpotCategoryController;
use App\Http\Controllers\SpotController;
use App\Http\Controllers\SpotTripController;
use App\Http\Controllers\ParameterController;

Route::get('/welcome', function () {
	return view('welcome');
   });

Route::get('/', [ParameterController::class, 'parameter'])->name('parameter');
Route::post('/parameter/input', [ParameterController::class, 'parameter_input'])->name('parameter_input');
Route::get('/parameters/{parameter}/dart', [ParameterController::class, 'dart'])->name('dart');
Route::group(['middleware' => ['auth', 'verified']], function(){
	Route::post('/parameters/{parameter}/dart/spot/input', [SpotController::class, 'create_spots'])->name('create_spots');
	Route::get('/users/{user}/trip/{trip}/list', [SpotTripController::class, 'create'])->name('create');
	Route::post('/store/spot_trip/status', [SpotTripController::class, 'store_status'])->name('store_status');
	Route::get('/users/{user}/trip/{trip}/create', [TripController::class, 'create'])->name('trip_create');
	Route::post('/store/trip', [TripController::class, 'store'])->middleware('auth');


});

Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


/*
Route::get('/', function () {
	return view('welcome');
});

Route::get('/dashboard', function () {
	return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
	Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
	Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
	Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/users/{user}/trip/index', [TripController::class, 'index'])->middleware('auth')->name('trip.index');
Route::post('/users/{user}/trip/input', [ParameterController::class, 'post_parameter'])->middleware('auth');
Route::get('/users/{user}/trip/darts', [ParameterController::class, 'show_darts'])->middleware('auth');
Route::post('/users/{user}/trip/list', [SpotController::class, 'create_spots'])->middleware('auth');
Route::get('/create/users/{user}/trip/list', [SpotTripController::class, 'create'])->middleware('auth');
Route::post('/store/spot_trip/status', [SpotTripController::class, 'store_status'])->middleware('auth');
Route::get('/users/{user}/create/trip/{trip}', [TripController::class, 'create'])->middleware('auth');
Route::post('/store/trip', [TripController::class, 'store'])->middleware('auth');


require __DIR__.'/auth.php';
*/