<?php

use App\Http\Controllers\Admin\OptionController;
use App\Http\Controllers\Admin\PropertyController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\PropertyController as ControllersPropertyController;
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

Route::get('/', [HomeController::class, 'index'])->name('index');
Route::prefix('/biens')->controller(ControllersPropertyController::class)->name('property.')->group(function () {
    $idRegex = '[0-9]+';
    $slugRegex = '[0-9a-z\-]+';
    Route::get('/', 'index')->name('index');
    Route::get('/{slug}/{property}', 'show')->name('show')->where([
        'slug' => $slugRegex,
        'property' => $idRegex
    ]);
    Route::post('/{property}/contact', 'contact')->name('contact')->where([
        'property' => $idRegex
    ]);
});


Route::prefix('/admin')->name('admin.')->group(function () {
    Route::resource('property', PropertyController::class)->except('show');
    Route::resource('option', OptionController::class)->except('show');
});