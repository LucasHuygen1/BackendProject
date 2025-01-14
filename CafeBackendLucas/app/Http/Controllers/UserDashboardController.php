<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drink;

class UserDashboardController extends Controller
{
    public function index()
    {
        $drinks = Drink::all();
        return view('user.dashboard', compact('drinks'));
    }
}