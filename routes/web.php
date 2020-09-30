<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
use App\Http\Controllers\AdsController;
use App\Http\Controllers\AdCommentsController;
use App\Http\Controllers\ItemsController;
use App\Http\Controllers\ContactAdCreatorController;
use App\Http\Controllers\UpcomingUserAdsController;
use App\Http\Controllers\PlannersController;
use App\Http\Controllers\AdPlannerController;
use App\Http\Controllers\UserAdsController;
use App\Http\Controllers\UserItemsController;
use App\Http\Controllers\UsersController;

Route::get('/', function () {
    return view('welcome');
});

Route::group(['middleware' => 'auth'],function () {
    Route::get('/ads/create', [AdsController::class, 'create']);
    Route::get('/ads/edit/{ad}', [AdsController::class, 'edit']);
    Route::patch('/ads/{ad}', [AdsController::class, 'update']);
    Route::post('/ads', [AdsController::class, 'store']);
    Route::delete('/ads/{ad}', [AdsController::class, 'destroy']);

    Route::post('/ads/{ad}/comments', [AdCommentsController::class, 'store']);

    Route::post('/items/{ad}', [ItemsController::class, 'store']);
    Route::patch('/items/{item}', [ItemsController::class, 'update']);
    Route::delete('/items/{item}', [ItemsController::class, 'destroy']);

    Route::post('/contact/ads/{ad}', [ContactAdCreatorController::class, 'store']);


    Route::get('/users', [UsersController::class, 'index']);
    Route::get('/users/{user}/ads', [UserAdsController::class, 'index']);
    Route::get('/users/{user}/items', [UserItemsController::class, 'index']);

    Route::get('/users/{user}/ads/upcoming', [UpcomingUserAdsController::class, 'show']);

    Route::get('/planners', [PlannersController::class, 'index']);
    Route::get('/planners/create', [PlannersController::class, 'create']);
    Route::get('/planners/{planner}', [PlannersController::class, 'show']);
    Route::post('/planners', [PlannersController::class, 'store']);

    Route::post('/planners/{planner}/ads/{ad}', [AdPlannerController::class, 'store']);
});

Route::get('/ads', [AdsController::class, 'index']);
Route::get('/items', [ItemsController::class, 'index']);
Route::get('/ads/{ad}', [AdsController::class, 'show']);
Route::get('/items/{item}', [ItemsController::class, 'show']);


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
