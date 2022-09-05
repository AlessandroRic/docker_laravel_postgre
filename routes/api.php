<?php

use App\Http\Controllers\Api\ClientController;
use App\Http\Controllers\Api\ConfigController;
use App\Http\Controllers\Api\DiscController;
use App\Http\Controllers\Api\PurchaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::prefix('/discs')->group(function() {
    Route::get('/', [DiscController::class, 'index']);
    Route::get('/{id}', [DiscController::class, 'show']);
    Route::post('/', [DiscController::class, 'store']);
    Route::put('/{id}', [DiscController::class, 'update']);
    Route::delete('/{id}', [DiscController::class, 'destroy']);
});

Route::prefix('/clients')->group(function() {
    Route::get('/', [ClientController::class, 'index']);
    Route::get('/{id}', [ClientController::class, 'show']);
    Route::post('/', [ClientController::class, 'store']);
    Route::put('/{id}', [ClientController::class, 'update']);
    Route::delete('/{id}', [ClientController::class, 'destroy']);
});

Route::prefix('/sales')->group(function() {
    Route::get('/', [PurchaseController::class, 'index']);
    Route::get('/{id}', [PurchaseController::class, 'show']);
    Route::post('/', [PurchaseController::class, 'store']);
});

Route::prefix('/configs')->group(function() {
    Route::get('/', [ConfigController::class, 'index']);
    Route::get('/{id}', [ConfigController::class, 'show']);
    Route::post('/', [ConfigController::class, 'store']);
});
