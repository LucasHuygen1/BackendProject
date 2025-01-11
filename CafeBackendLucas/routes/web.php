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
    Route::get('/admin/drinks', [AdminDrinkController::class, 'index'])->name('admin.drinks.index');
    Route::resource('admin/drinks', AdminDrinkController::class)->except(['index']);

    Route::resource('admin/drinks', AdminDrinkController::class)->names([
        'index'   => 'admin.drinks.index',
        'create'  => 'admin.drinks.create',
        'store'   => 'admin.drinks.store',
        'show'    => 'admin.drinks.show',
        'edit'    => 'admin.drinks.edit',
        'update'  => 'admin.drinks.update',
        'destroy' => 'admin.drinks.destroy',
    ]);
    
    //route naar dashboard gebruikt homecontroller. 
    route::get('/admin/dashboard', [HomeController::class, 'index'])
    ->name('admin.dashboard');  

    // full CRUD:
    Route::resource('admin/users', AdminUserController::class)->names([
        'index'   => 'admin.users.index',
        'create'  => 'admin.users.create',
        'store'   => 'admin.users.store',
        'show'    => 'admin.users.show',
        'edit'    => 'admin.users.edit',
        'update'  => 'admin.users.update',
        'destroy' => 'admin.users.destroy',
    ]);
});
