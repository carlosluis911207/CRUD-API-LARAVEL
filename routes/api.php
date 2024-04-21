<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\TagController;
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

/* TAGS */
Route::prefix('tags')->group(function () {
    Route::get('/', [TagController::class, 'index']);
    Route::get('/{tag}', [TagController::class, 'show']);
    Route::post('store', [TagController::class, 'store']);
    Route::put('{tag}', [TagController::class, 'update']);
    Route::delete('{tag}', [TagController::class, 'destroy']);
});
