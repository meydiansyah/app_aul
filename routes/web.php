<?php
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {return redirect()->route('login');});

Auth::routes();

Route::group(['middleware' => 'verified', 'cekstatus:active'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name( 'home');

    //Route Freelancer and Admin
    Route::group(['middleware' => ['auth', 'ceklevel:admin,freelancer']], function () {
        Route::resource('/profile', App\Http\Controllers\ProfileController::class, ['only' => ['index', 'update']]);
        Route::resource('/portofolio', App\Http\Controllers\PortofolioController::class);
        Route::resource('/jasa', App\Http\Controllers\JasaController::class);
        Route::resource('/order', App\Http\Controllers\OrderController::class);
        Route::resource('/review', App\Http\Controllers\ReviewController::class);
    });
    
    //Route Admin
    Route::group(['middleware' => ['auth', 'ceklevel:admin']], function () {
        Route::resource('/home', App\Http\Controllers\HomeController::class, ['except' => ['index', 'show', 'create', 'store', 'delete']]);
        Route::resource('/category', App\Http\Controllers\CategoryController::class, ['except' => ['show']]);
        Route::resource('/client', App\Http\Controllers\ClientController::class, ['except' => ['create', 'store']]);
        Route::resource('/freelancer', App\Http\Controllers\FreelancerController::class, ['except' => ['create', 'store']]);
        Route::resource('/acc-setting', App\Http\Controllers\AccController::class, ['only' => ['index', 'destroy']]);
    });

    //Route Freelancer
    Route::group(['middleware' => ['auth', 'ceklevel:freelancer']], function () {
        Route::resource('/inbox', App\Http\Controllers\InboxController::class, ['only' => ['index']]);
        Route::resource('/jadwal', App\Http\Controllers\JadwalController::class, ['only' => ['index']]);
    });

});