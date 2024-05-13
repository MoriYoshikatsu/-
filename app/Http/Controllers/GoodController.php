<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Good;

class GoodController extends Controller
{
    public function index(good $good)
    {
        return $good->get();
    }
}
