<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminDrinkController;



Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';



//route naar user panel voor admin.
Route::middleware(['auth','admin'])->group(function () {
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

    route::get('/admin/dashboard', [HomeController::class, 'index'])
    ->name('admin.dashboard');  
    
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
