<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpotCategory;

class SpotCategoryController extends Controller
{
    public function create(SpotCategory $spot_category)
    {
        return view('home2')->with(['spot_categories' => $spot_category->get()]);
        dd();
    }
}
