<?php

use App\Http\Controllers\Api\Page\DataController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');


// datos de los productos de una empresa
Route::get('/company/{company}', [DataController::class, 'index']);