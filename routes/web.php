<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\EleveController;


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

// Route::get('/', function () {
//     return redirect('/admin');
// });

//auth route
Route::get('/', [AuthController::class, 'login']);
Route::post('login', [AuthController::class, 'AuthLogin']);
Route::get('logout', [AuthController::class, 'logout']);


Route::get('/register', [AuthController::class, 'register']);


Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard'])->name('dashboard');
    // Afficher le formulaire d'ajout d'élève


   // Route::get('/eleves/ajouter', [EleveController::class, 'ajouter'])->name('eleves.ajouter');
    // Route::get('/eleves/modifier/{id}', [EleveController::class, 'modifier'])->name('eleves.modifier');
    // Route::get('/eleves/supprimer/{id}', [EleveController::class, 'supprimer'])->name('eleves.supprimer');
    // Route::get('/eleves/voir/{id}', [EleveController::class, 'voir'])->name('eleves.voir');

});

//eleves

Route::get('/eleves', [EleveController::class, 'liste_eleves'])->name('liste_eleves');
Route::get('/eleves/ajouter', [EleveController::class, 'ajoutElevesForm'])->name('ajout_eleve');
Route::post('/eleves/ajouter', [EleveController::class, 'ajoutEleves'])->name('ajouter_eleve');
Route::get('/eleves/modifier/{id}', [EleveController::class, 'editElevesForm'])->name('edit_eleve');
Route::put('/eleves/modifier/{id}', [EleveController::class, 'modifier'])->name('eleves_modifier');
Route::get('/eleves/supprimer/{id}', [EleveController::class, 'delete'])->name('eleve_delete');
Route::get('/eleves/details/{id}', [EleveController::class, 'details'])->name('eleve_voir');



// Route::get('/eleves/ajouter', [EleveController::class, 'ajouter'])->name('eleves.ajouter');
    // Route::get('/eleves/modifier/{id}', [EleveController::class, 'modifier'])->name('eleves.modifier');
    // Route::get('/eleves/supprimer/{id}', [EleveController::class, 'supprimer'])->name('eleves.supprimer');
    // Route::get('/eleves/voir/{id}', [EleveController::class, 'voir'])->name('eleves.voir');



//enseignants
Route::get('/enseignants', function () {
    return view('pages.enseignant.enseignants');
})->name('enseignants');

//matieres
Route::get('/matieres', function () {
    return view('pages.matiere.matieres');
})->name('matieres');

//classes
Route::get('/classes', function () {
    return view('pages.classe.classes');
})->name('classes');
