<?php

use App\Http\Controllers\Api\DiscController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;
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

Route::get('/redis', function (Request $request) {
    // Redis::set('user_visits', 1);
    if (!Redis::exists('cristian')) 
        Redis::setex('cristian',10,0);
    return Redis::incr('cristian'); 
    //$redis = Redis::set('alessandro_123', "guardando os dados do redis");
    return true;
});