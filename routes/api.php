<?php

use Illuminate\Support\Facades\Route;
use Shopper\Framework\Http\Controllers\Api\Catalog\{ProductController, CategoryController};
use Shopper\Framework\Http\Controllers\Api\Settings\{CountryController, CurrencyController, SettingController};

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::get('/catalog/categories', [CategoryController::class, 'lists']);
Route::get('/catalog/products', [ProductController::class, 'lists']);
Route::get('/countries', [CountryController::class, 'lists']);
Route::get('/currencies', [CurrencyController::class, 'lists']);
Route::get('/currencies/{code}', [CurrencyController::class, 'getCurrencyByCode']);

// shop initialization
Route::post('/configuration', [SettingController::class, 'general']);

// settings page
Route::prefix('settings')->group(function () {
    Route::put('/general',   [SettingController::class, 'general']);
});