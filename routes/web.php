<?php

use App\Http\Controllers\BoxesController;
use App\Http\Controllers\FacturesController;
use App\Http\Controllers\ImpotsController;
use App\Http\Controllers\LocatairesController;
use App\Http\Controllers\ModeleContratController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReservationsController;
use Illuminate\Support\Facades\Route;

//Route::get('/dashboard', function () {
//    return view('welcome');
//});

Route::get('/', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    // Profile routes
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Boxes routes
    Route::get('/boxes', [BoxesController::class, 'index'])->name('boxes.index');
    Route::get('/boxe/create', [BoxesController::class, 'create'])->name('boxes.create');
    Route::post('/boxe', [BoxesController::class, 'store'])->name('boxes.store');
    Route::get('/boxe/{id}', [BoxesController::class, 'show'])->name('boxes.show');
    Route::get('/boxe/edit/{id}', [BoxesController::class, 'view_edit'])->name('boxes.edit');
    Route::put('/boxe/edit/{id}', [BoxesController::class, 'edit'])->name('boxes.update');
    Route::delete('/boxe/{id}', [BoxesController::class, 'destroy'])->name('boxes.destroy');

    // Reservations routes
    Route::get('/reservations', [ReservationsController::class, 'index'])->name('reservations.reservations');
    Route::post('/reservations', [ReservationsController::class, 'store'])->name('reservations.store');
    Route::delete('/reservations/{id}', [ReservationsController::class, 'destroy'])->name('reservations.destroy');

    // Locataires routes
    Route::get('/locataires', [LocatairesController::class, 'index'])->name('locataires.index');
    Route::get('/locataire/create', [LocatairesController::class, 'create'])->name('locataires.create');
    Route::post('/locataire', [LocatairesController::class, 'store'])->name('locataires.store');
    Route::get('/locataire/{id}', [LocatairesController::class, 'show'])->name('locataires.show');
    Route::get('/locataire/edit/{id}', [LocatairesController::class, 'edit'])->name('locataires.edit');
    Route::put('/locataire/edit/{id}', [LocatairesController::class, 'update'])->name('locataires.update');
    Route::delete('/locataire/{id}', [LocatairesController::class, 'destroy'])->name('locataires.destroy');

    // Modèle de contrat routes
    Route::get('/modele-contrat', [ModeleContratController::class, 'index'])->name('modele_contrat.modeles_contrat');
    Route::get('/modele-contrat/create', [ModeleContratController::class, 'create'])->name('modele_contrat.create');
    Route::post('/modele-contrat', [ModeleContratController::class, 'store'])->name('modele_contrat.store');
    Route::get('/modele-contrat/{id}', [ModeleContratController::class, 'show'])->name('modele_contrat.show');
    Route::put('/modele-contrat/edit/{id}', [ModeleContratController::class, 'update'])->name('modele_contrat.update');
    Route::get('/modele-contrat/edit/{id}', [ModeleContratController::class, 'edit'])->name('modele_contrat.edit');
    Route::delete('/modele-contrat/{id}', [ModeleContratController::class, 'destroy'])->name('modele_contrat.destroy');


    Route::get('/factures',[FacturesController::class, 'index'])->name('factures.index');
    Route::get('/facture/{id}', [FacturesController::class, 'show'])->name('factures.show');

    Route::get('/factures/create/{reservation}', [FacturesController::class, 'show_create_factures_monthly'])->name('factures.show_create_factures_monthly');
    Route::post('/factures/create/{reservation}', [FacturesController::class, 'create_factures_monthly'])->name('factures.create_factures_monthly');

    Route::get('/impots', [ImpotsController::class, 'showCalculations'])->name('impots.calculations');

});

require __DIR__.'/auth.php';
