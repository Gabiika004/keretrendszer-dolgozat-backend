<?php

use Illuminate\Http\Request;
use App\Http\Controllers\API\CelebrityController;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::middleware('api')->group(function () {
    Route::apiResource('celebrities', CelebrityController::class);
});
