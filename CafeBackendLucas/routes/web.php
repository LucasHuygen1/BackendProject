<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminUserController;
use App\Http\Controllers\AdminDrinkController;
use App\Http\Controllers\AdminNewsController;
use App\Http\Controllers\UserDashboardController;
use App\Http\Controllers\AdminDashboardController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\FaqController;
use App\Mail\TestMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminContactController;

Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');


Route::get('/send-test-email', function () {
    $messageContent = "Dit is een testbericht vanuit mijn Laravel-app via Mailtrap!";
    Mail::to(config('mail.admin_address'))->send(new TestMail($messageContent));
    return "Test email verzonden!";
});


Route::get('/', function () {
    return view('welcome');
});


Route::get('/contact', [ContactController::class, 'show'])->name('contact.show');
Route::post('/contact', [ContactController::class, 'submit'])->name('contact.submit');
//routes voor idereeen

//route FAQ publiek
//public index voor normake users
Route::get('/faq', [FaqController::class, 'publicIndex'])->name('faq.public.index');
Route::get('/faq/{id}', [FaqController::class, 'show'])->name('faq.public.show');


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
//---------------------------------------------------------------------------------------
// einde routes publiek


//routes users
// profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

//--------------------------------------------------------------------------------------------------
//einde route users


//route admins
//middleware voor admin, rol check + auth.
Route::middleware(['auth','admin'])->group(function () {
    //contact admin
    Route::resource('admin/contact', AdminContactController::class)->names([
        'index'   => 'admin.contact.index',
        'show'    => 'admin.contact.show',
    ]);
    
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
    
    //FAQ CRUD
    Route::resource('admin/faq', FaqController::class)->names([
        'index'   => 'admin.faq.index',
        'create'  => 'admin.faq.create',
        'store'   => 'admin.faq.store',
        'show'    => 'admin.faq.show',
        'edit'    => 'admin.faq.edit',  
        'update'  => 'admin.faq.update',
        'destroy' => 'admin.faq.destroy',
        ]);
});

//--------------------------------------------------------------------------------------------------
//einde route admins