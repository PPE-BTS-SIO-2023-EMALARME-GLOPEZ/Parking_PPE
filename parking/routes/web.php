<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InscriptionController;

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


/*
/------------------------
/ Authentification
/------------------------
*/

Route::get('/', [AuthController::class, 'login'])
    ->name('login');

Route::get('/inscription', [InscriptionController::class, 'afficher'])->name('inscription');

Route::post('/authenticate', [AuthController::class, 'authenticate'])
    ->name('authenticate');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

/*
/--------------------------
/   Dashboard utilisateur 
/--------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', DashboardController::class)->name('dashboard');
});


//Route::put('/dashboard/{$user_id}/reserver', [ReservationController::class, 'create'])->name('reserver');
