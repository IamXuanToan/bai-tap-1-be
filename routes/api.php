<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TaskManagerController;

// Route::get('/user', function (Request $request) {
//     // return $request->user();
//     return 'lll';
// })->middleware('auth:sanctum');
Route::apiResource('/task', TaskManagerController::class);