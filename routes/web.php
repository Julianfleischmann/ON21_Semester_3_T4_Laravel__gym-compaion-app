<?php

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

Route::get('', function () {
    return redirect( '/trainings');
});


Route::get('/', function () {
})->middleware(['auth', 'verified'])->name('dashboard');

require __DIR__.'/auth.php';


Route::middleware(['auth', 'verified'])->group(function () {

    Route::resource('trainings', TrainingController::class);

    Route::get('/dashboard', function () {
        return view('dashboard');
    });

    Route::get('/test', function () {
        return view('test');
    });

});
