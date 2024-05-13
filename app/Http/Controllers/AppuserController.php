<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appuser;

class AppuserController extends Controller
{
    public function index(appuser $appuser)
    {
        return $appuser->get();
    }
}
