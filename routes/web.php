<?php

use App\Http\Controllers\bookMonitorController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('/views/bookmonitor', [bookMonitorController::class, 'index'])
->middleware(['auth', 'verified'])
->name('bookmonitor');


Route::get('/bookmonitor/add', function () {
    return view('bookmonitor.add');
})->middleware(['auth', 'verified'])->name('bookmonitor-add');

Route::post('/bookmonitor/add',[bookMonitorController::class, 'store'] )
->middleware(['auth', 'verified'])
->name('bookmonitor-store');

Route::get('/bookmonitorbno/{bno}', [bookMonitorController::class, 'show'])
->middleware(['auth', 'verified'])
->name('bookmonitor-show');

Route::delete('/bookmonitor/delete/{bno}', [bookMonitorController::class, 'destroy'])
->middleware(['auth', 'verified'])
->name('bookmonitor-delete');

Route::get('/bookmonitor/edit/{bno}', [bookMonitorController::class, 'edit'])
->middleware(['auth', 'verified'])
->name('bookmonitor-edit');

Route::patch('/bookmonitor/update/{bno}', [bookMonitorController::class, 'update'])
->middleware(['auth', 'verified'])
->name('bookmonitor-update');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
