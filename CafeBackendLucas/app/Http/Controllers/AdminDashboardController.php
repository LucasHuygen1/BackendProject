<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    public function index()
    {
        $userCount = \App\Models\User::count();
        $drinkCount = \App\Models\Drink::count();
        $newsCount  = \App\Models\News::count();

        return view('admin.dashboard', compact('userCount', 'drinkCount', 'newsCount'));
    }
}
