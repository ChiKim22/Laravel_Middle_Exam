<?php

use App\Http\Controllers\CarsController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::get('/cars', [CarsController::class, 'index'])->name('cars.index');

Route::get('/cars/create', [CarsController::class, 'create'])->middleware(['auth'])->name('cars.create');

Route::post('/cars/store', [CarsController::class, 'store'])->name('cars.store');

Route::get('/cars/{car}', [CarsController::class, 'show'])->name('cars.show');

Route::get('/cars/edit/{id}', [CarsController::class, 'edit'])->middleware(['auth'])->name('cars.edit');

Route::put('cars/{cars}', [CarsController::class, 'update'])->name('cars.update');

Route::delete('/cars/{cars}', [CarsController::class, 'destroy'])->middleware(['auth'])->name('cars.delete');


require __DIR__.'/auth.php';
