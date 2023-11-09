<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;

class UserDashboardController extends Controller
{
    public function index()
    {
        return view('user-dashboard');
    }
}
