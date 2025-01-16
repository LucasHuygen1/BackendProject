<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Drink;

class UserDashboardController extends Controller
{
    // Dashboard
    public function index()
    {
        $drinks = Drink::all();
        return view('user.dashboard', compact('drinks'));
    }

    // specifieke drink teruggeven
    public function show(Drink $drink)
    {
        $drink->load('comments.user'); // comments en gebruikers
        return view('drinks.show', compact('drink'));
    }
}
