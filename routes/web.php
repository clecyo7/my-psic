<?php

use App\Http\Controllers\CompanyController;
use App\Http\Controllers\ConvenioController;
use App\Http\Controllers\DashboardController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return Inertia::render('App', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {

    Route::get('/agenda', function () {
        return Inertia::render('Agenda/Index');
    })->name('agenda');

    // Route::get('/clinica/convenio', function () {
    //     return Inertia::render('Clinica/Convenio');
    // })->name('convenio');

    Route::get('/company', [CompanyController::class, 'index'])->name('company');
    Route::get('/dashboard', [DashboardController::class, 'graphic'])->name('dashboard');
    Route::get('/clinica/convenio', [ConvenioController::class, 'index'])->name('convenio');
});
