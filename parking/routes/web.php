<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\InscriptionController;
use App\Http\Controllers\ReservationController;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::post('/authenticate', [AuthController::class, 'authenticate'])
    ->name('authenticate');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

/*
/------------------------
/   Inscription 
/------------------------
*/
Route::name('inscription.')->group(function () {

    Route::get('/inscription', [InscriptionController::class, 'create'])->name('create');

    Route::post('/inscription', [InscriptionController::class, 'store'])->name('store');
});

/*
/--------------------------
/   Dashboard utilisateur 
/--------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'accueil'])->name('dashboard');

    Route::name('reservation.')->group(function () {
        Route::get('/reserver', [ReservationController::class, 'create'])->name('create');
        Route::put('/reserver', [ReservationController::class, 'close'])->name('close');
    });

    Route::get('/parametres', [DashboardController::class, 'parametres'])->name('parametres');
    Route::post('/parametres/password', [UserController::class, 'storeNewPassword'])->name('changePassword');
});
