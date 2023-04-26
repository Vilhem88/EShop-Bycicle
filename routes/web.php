<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CartController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\BicycleController;
use App\Http\Controllers\ProfileController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');
// -------------------------------------------------------------------------------------- //

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
// -------------------------------------------------------------------------------------- //

Route::get('/home', [PageController::class, 'index'])->name('pages.index');

// -------------------------------------------------------------------------------------- //

Route::group(['prefix' => 'carts', 'controller' => CartController::class,], function () {
    Route::get('/', 'index')->name('carts.index');
    Route::get('/placeOrder', 'placeOrder')->name('carts.placeOrder');
    Route::post('/', 'addToCart')->name('carts.addToCart');
    Route::post('/userDetailsOrder', 'userDetailsOrder')->name('carts.userDetailsOrder');
    Route::put('/update-from-cart/{id}', 'updateFromCart')->name('carts.updateFromCart');
    Route::get('/delete-from-cart/{id}', 'deleteFromCart')->name('carts.deleteFromCart');
});

// -------------------------------------------------------------------------------------- //

Route::group(['prefix' => 'bicycles', 'controller' => BicycleController::class,], function () {
    Route::get('/create', 'create')->name('bicycles.create');
    Route::get('/show/{id}', 'show')->name('bicycles.show');
    Route::post('/', 'store')->name('bicycles.store');
});






require __DIR__ . '/auth.php';
