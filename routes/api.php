<?php

use App\Http\Controllers\APIController;
use App\Http\Controllers\BarangController;
use App\Mail\TestMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Mail;



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

Route::middleware('auth:sanctum')->get('/profile', function (Request $request) {
    return $request->user();
});

Route::post('register', [APIController::class, 'register']);
Route::post('login', [APIController::class, 'login']);
Route::middleware('auth:sanctum')->get('home', [APIController::class, 'home']);
Route::middleware('auth:sanctum')->post('logout', [APIController::class, 'logout']);

// Barang Route
Route::middleware('auth:sanctum')->post('create', [BarangController::class, 'create']);
Route::middleware('auth:sanctum')->delete('delete/{id}', [BarangController::class, 'delete']);
Route::middleware('auth:sanctum')->post('update/{id}', [BarangController::class, 'update']);
// Route::post('create', [BarangController::class, 'create']);

// Route::middleware('auth:sanctum')->get('/contact', function() {
//     Mail::to('jundirochaziz@gmail.com')->send(new TestMail());
// });

Route::middleware('auth:sanctum')->get('/contact', [APIController::class, 'contact']);
