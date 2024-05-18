<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SpotCategory;

class SpotCategoryController extends Controller
{
    public function index(spot_category $spot_category)
    {
        return $spot_category->get();
    }
}
