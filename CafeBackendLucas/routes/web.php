<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminDrinkController;
use App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\NewsController;


Route::get('/', function () {
    return view('welcome');
});

// Public Profile page
Route::get('/profile/{name}', [ProfileController::class, 'show'])->name('profile.show');

// Public Users list (with search)
Route::get('/users', [ProfileController::class, 'index'])->name('profile.index');

// user dahboard
Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', [UserDashboardController::class, 'index'])->name('dashboard');
});

Route::get('/news', [NewsController::class, 'index'])
    ->name('news.index');

// profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



//middleware voor admin, rol check + auth.
Route::middleware(['auth','admin'])->group(function () {
    // admin dashboard
    Route::get('/admin/dashboard', [AdminDashboardController::class, 'index'])->name('admin.dashboard');

    // Admin Dashboard drinks management
    Route::resource('admin/drinks', AdminDrinkController::class)->names([
        'index'   => 'admin.drinks.index',
        'create'  => 'admin.drinks.create',
        'store'   => 'admin.drinks.store',
        'show'    => 'admin.drinks.show',
        'edit'    => 'admin.drinks.edit',
        'update'  => 'admin.drinks.update',
        'destroy' => 'admin.drinks.destroy',
    ]);

    // full CRUD admin panel
    Route::resource('admin/users', AdminUserController::class)->names([
        'index'   => 'admin.users.index',
        'create'  => 'admin.users.create',
        'store'   => 'admin.users.store',
        'show'    => 'admin.users.show',
        'edit'    => 'admin.users.edit',
        'update'  => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
    ]);

    
    //Admin news management
    Route::resource('admin/news', AdminNewsController::class)->names([
        'index'   => 'admin.news.index',
        'create'  => 'admin.news.create',
        'store'   => 'admin.news.store',
        'show'    => 'admin.news.show',
        'edit'    => 'admin.news.edit',
        'update'  => 'admin.news.update',
        'destroy' => 'admin.news.destroy',
        ]);
});
