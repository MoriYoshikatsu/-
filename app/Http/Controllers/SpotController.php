<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Spot;


class SpotController extends Controller
{
    public function firstpin(Spot $spot)
    {
        return view('firstpin')->with(['spots' => $spot->get()]);
        dd();
    }
}
