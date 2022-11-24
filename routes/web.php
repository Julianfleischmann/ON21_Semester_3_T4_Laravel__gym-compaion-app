<?php

use App\Http\Controllers\CountTrainings;
use App\Http\Controllers\TrainingNameController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TrainingController;

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
    return redirect( 'login');
});

/**
 * Weiterleiten auf die Trainings-Seite
 */
Route::get('/', function () {
    return redirect('trainings');
})->middleware(['auth', 'verified'])->name('trainings');

/**
 * In der Middleware befinden sich lediglich Seiten, die nur autorisierten Nutzern zur Verfügung stehen.
 */
Route::middleware(['auth', 'verified'])->group(function () {

    Route::resource('trainings', TrainingController::class);

    Route::resource('training-names', TrainingNameController::class);

    Route::get('count-trainings', [CountTrainings::class, 'countTrainings'])->name('count-trainings');

});

require __DIR__.'/auth.php';
