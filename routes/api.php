<?php

use App\Http\Controllers\Api\InterestedBuyerController;
use App\Http\Controllers\Api\StoreController;
use App\Http\Controllers\Api\StoreSaleController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('stores', [StoreController::class, 'index']);
Route::get('stores/{id}', [StoreController::class, 'show']);
Route::post('interested', [InterestedBuyerController::class, 'store']);
Route::post('store-sales', [StoreSaleController::class, 'store']);
Route::post('approve/{id}', [StoreSaleController::class, 'approve']);

