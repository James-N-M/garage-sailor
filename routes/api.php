<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\API\AdsController;
use App\Http\Controllers\API\ContactsController;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('/ads', [AdsController::class, 'index']);

Route::get('/contacts', [ContactsController::class, 'index']);
Route::get('/conversations/{id}', [ContactsController::class, 'getMessagesFor']);
