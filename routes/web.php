<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UserpointController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\InventarioController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\LogroController;
use App\Http\Controllers\RankingController;
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
Route::post('/index/guardarInventario', [InventarioController::class, 'guardarInventario']);
Route::get('/index/verInventario', [InventarioController::class, 'verInventario']);


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/index/api', function () {
        $user = auth()->check() ? auth()->user() : null;
        return response(json_encode($user),200)->header("Content-Type", "text/plain");
    });
});

require __DIR__.'/auth.php';

Route::get('/admin/dashboard', function () {
    return view('admin.dashboard');
})->middleware(['auth:admin', 'verified'])->name('admin.dashboard');

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', function () {return view('admin.dashboard');})->name('admin.menu');
    Route::get('/admin/userpoint', [UserpointController::class, 'index'])->name('admin.userpoint.index');
    Route::get('/admin/userpoint/id={userpoint?}', [UserpointController::class, 'show'])->name('admin.userpoint.show');
    Route::get('/admin/userpoint/create', [UserpointController::class, 'create'])->name('admin.userpoint.create');
    Route::post('/admin/userpoint/{userpoint?}', [UserpointController::class, 'store'])->name('admin.userpoint.store');
    Route::get('/admin/userpoint/{userpoint}/edit', [UserpointController::class, 'edit'])->name('admin.userpoint.edit');
    Route::patch('/admin/userpoint/{userpoint}', [UserpointController::class, 'update'])->name('admin.userpoint.update');
    Route::delete('/admin/userpoint/{userpoint}', [UserpointController::class, 'destroy'])->name('admin.userpoint.destroy');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', function () {return view('admin.dashboard');})->name('admin.menu');
    Route::get('/admin/user', [UserController::class, 'index'])->name('admin.user.index');
    Route::get('/admin/user/id={user?}', [UserController::class, 'show'])->name('admin.user.show');
    Route::get('/admin/user/create', [UserController::class, 'create'])->name('admin.user.create');
    Route::post('/admin/user/{user?}', [UserController::class, 'store'])->name('admin.user.store');
    Route::get('/admin/user/{user}/edit', [UserController::class, 'edit'])->name('admin.user.edit');
    Route::patch('/admin/user/{user}', [UserController::class, 'update'])->name('admin.user.update');
    Route::delete('/admin/user/{user}', [UserController::class, 'destroy'])->name('admin.user.destroy');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', function () {return view('admin.dashboard');})->name('admin.menu');
    Route::get('/admin/inventario', [InventarioController::class, 'index'])->name('admin.inventario.index');
    Route::get('/admin/inventario/id={inventario?}', [InventarioController::class, 'show'])->name('admin.inventario.show');
    Route::get('/admin/inventario/create', [InventarioController::class, 'create'])->name('admin.inventario.create');
    Route::post('/admin/inventario/{inventario?}', [InventarioController::class, 'store'])->name('admin.inventario.store');
    Route::get('/admin/inventario/{inventario}/edit', [InventarioController::class, 'edit'])->name('admin.inventario.edit');
    Route::patch('/admin/inventario/{inventario}', [InventarioController::class, 'update'])->name('admin.inventario.update');
    Route::delete('/admin/inventario/{inventario}', [InventarioController::class, 'destroy'])->name('admin.inventario.destroy');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', function () {return view('admin.dashboard');})->name('admin.menu');
    Route::get('/admin/item', [ItemController::class, 'index'])->name('admin.item.index');
    Route::get('/admin/item/id={item?}', [ItemController::class, 'show'])->name('admin.item.show');
    Route::get('/admin/item/create', [ItemController::class, 'create'])->name('admin.item.create');
    Route::post('/admin/item/{item?}', [ItemController::class, 'store'])->name('admin.item.store');
    Route::get('/admin/item/{item}/edit', [ItemController::class, 'edit'])->name('admin.item.edit');
    Route::patch('/admin/item/{item}', [ItemController::class, 'update'])->name('admin.item.update');
    Route::delete('/admin/item/{item}', [ItemController::class, 'destroy'])->name('admin.item.destroy');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', function () {return view('admin.dashboard');})->name('admin.menu');
    Route::get('/admin/logro', [LogroController::class, 'index'])->name('admin.logro.index');
    Route::get('/admin/logro/id={logro?}', [LogroController::class, 'show'])->name('admin.logro.show');
    Route::get('/admin/logro/create', [LogroController::class, 'create'])->name('admin.logro.create');
    Route::post('/admin/logro/{logro?}', [LogroController::class, 'store'])->name('admin.logro.store');
    Route::get('/admin/logro/{logro}/edit', [LogroController::class, 'edit'])->name('admin.logro.edit');
    Route::patch('/admin/logro/{logro}', [LogroController::class, 'update'])->name('admin.logro.update');
    Route::delete('/admin/logro/{logro}', [LogroController::class, 'destroy'])->name('admin.logro.destroy');
});

Route::middleware('auth:admin')->group(function () {
    Route::get('/admin/dashboard', function () {return view('admin.dashboard');})->name('admin.menu');
    Route::get('/admin/ranking', [RankingController::class, 'index'])->name('admin.ranking.index');
    Route::get('/admin/ranking/id={ranking?}', [RankingController::class, 'show'])->name('admin.ranking.show');
    Route::get('/admin/ranking/create', [RankingController::class, 'create'])->name('admin.ranking.create');
    Route::post('/admin/ranking/{ranking?}', [RankingController::class, 'store'])->name('admin.ranking.store');
    Route::get('/admin/ranking/{ranking}/edit', [RankingController::class, 'edit'])->name('admin.ranking.edit');
    Route::patch('/admin/ranking/{ranking}', [RankingController::class, 'update'])->name('admin.ranking.update');
    Route::delete('/admin/ranking/{ranking}', [RankingController::class, 'destroy'])->name('admin.ranking.destroy');
});

require __DIR__.'/adminauth.php';