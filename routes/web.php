<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RoutesController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::controller(RoutesController::class)->group(function () {
    $routes = [
        'services',
        'about',
        'contact',
    ];

    foreach ($routes as $route) {
        Route::get($route, $route)->name($route);
    }

    Route::middleware([
        config('jetstream.auth_session'),
    ])->get('/', 'dashboard')->name('dashboard');
});
