<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\RestaurantController;
use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\User\HomeController;
use App\Http\Controllers\UserController;
use GuzzleHttp\Middleware;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
Route::get('/dashboard' , [DashboardController::class, 'index'])
        ->middleware('auth','role:admin')
        ->name('admin.dashboard');
Route::get('/restaurants', [RestaurantController::class, 'index'])
        ->middleware('auth', 'role:admin')
        ->name('admin.restaurants');
Route::delete('/admin/restaurants/{restaurant}', [RestaurantController::class, 'destroy'])
        ->middleware('auth', 'role:admin')
        ->name('admin.restaurants.destroy');
Route::get('/permissions', [PermissionController::class, 'index'])
        ->middleware('auth', 'role:admin')
        ->name('admin.permissions');

Route::post('/admin/assign-role', [UserController::class, 'assignRole'])
        ->middleware('auth', 'role:admin')
        ->name('admin.assign-role');
Route::get('/home', [HomeController::class, 'index'])->middleware('auth')->name('user.home');
