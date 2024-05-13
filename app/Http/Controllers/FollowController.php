<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Follow;

class FollowController extends Controller
{
    public function index(follow $follow)
    {
        return $follow->get();
    }
}
