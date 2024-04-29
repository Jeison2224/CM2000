<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserpointController;
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

Route::get('/index', function () {
    return view('index');
})->middleware(['auth', 'verified'])->name('index');


Route::post('/index/guardarPuntos', [UserpointController::class, 'guardarPuntos']);
Route::post('/index/all', [UserpointController::class, 'all']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

Route::middleware('adminauth')->group(function () {
    Route::get('userpoint', 'UserpointController@index')->name('userpoint.index');
    Route::get('userpoint/id={userpoint?}', 'UserpointController@show')->name('userpoint.show');
    Route::get('userpoint/create', 'UserpointController@create')->name('userpoint.create');
    Route::post('userpoint/{userpoint?}', 'UserpointController@store')->name('userpoint.store');
    Route::get('userpoint/{userpoint}/edit', 'UserpointController@edit')->name('userpoint.edit');
    Route::patch('userpoint/{userpoint}', 'UserpointController@update')->name('userpoint.update');
    Route::delete('userpoint/{userpoint}', 'UserpointController@destroy')->name('userpoint.destroy');
});

require __DIR__.'/adminauth.php';