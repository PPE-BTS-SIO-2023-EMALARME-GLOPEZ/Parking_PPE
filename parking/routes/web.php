<?php

use App\Http\Controllers\AdminController;
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

    Route::get('/inscription', [InscriptionController::class, 'afficherVue'])->name('create');

    Route::post('/inscription', [InscriptionController::class, 'store'])->name('store');
});

/*
/--------------------------
/   Dashboard utilisateur 
/--------------------------
*/

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', [DashboardController::class, 'user_homepage'])->name('dashboard');

    Route::name('user-reservation.')->group(function () {
        Route::get('/reserver', [ReservationController::class, 'create'])->name('create');
        Route::put('/reserver', [ReservationController::class, 'close'])->name('close');
    });

    Route::get('/parametres', [DashboardController::class, 'parametres'])->name('parametres');
    Route::post('/parametres/password', [UserController::class, 'storeNewPassword'])->name('changePassword');

    Route::group(['middleware' => ['admin']], function () {
        Route::get('/places', [AdminController::class, 'afficherPlaces'])->name('admin.places');
        Route::get('/utilisateurs', [AdminController::class, 'afficherPageUtilisateurs'])->name('admin.utilisateurs');
        Route::get('/reservations', [AdminController::class, 'afficherReservations'])->name('admin.reservations');

        Route::put('/autoriserDemandeInscription', [AdminController::class, 'autoriserDemandeInscription'])->name('admin.valider_inscription');
        Route::put('/desactiverUtilisateur', [AdminController::class, 'desactiverUtilisateur'])->name('admin.desactiver_utilisateur');

        Route::name('waitlist.')->group(function () {
            Route::put('/waitlist-up', [AdminController::class, 'waitlistUp'])->name('up');
            Route::put('/waitlist-down', [AdminController::class, 'waitlistDown'])->name('down');
        });

        Route::name('user.')->group(function () {
            Route::delete('/deleteUser', [AdminController::class, 'deleteUser'])->name('delete');
            Route::post('resetPassword', [AdminController::class, 'resetPassword'])->name('password');
        });

        Route::name('place.')->group(function () {
            Route::post('/places/ajouter', [AdminController::class, 'ajouterPlace'])->name('ajouter');
            Route::delete('/place/supprimer', [AdminController::class, 'supprimerPlace'])->name('supprimer');
        });

        Route::name('reservation.')->group(function () {
            Route::post('/reservation', [AdminController::class, 'creerReservation'])->name('create');
        });
    });
});
