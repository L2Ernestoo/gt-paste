<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PasteController;
use App\Http\Controllers\TokenController;
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


Route::middleware('auth:sanctum')->get('/user', [AuthController::class, 'getUser']);

Route::middleware('auth:sanctum')->get('/pastes', [PasteController::class, 'getPastes']);


Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');

Route::post('/tokens/create', [TokenController::class, 'create'])->middleware('auth:sanctum');
Route::delete('/tokens/{token}', [TokenController::class, 'destroy'])->middleware('auth:sanctum');
