<?php

use App\Http\Controllers\API\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\API\AuthController;
use App\Http\Controllers\API\RoleController;
use App\Http\Controllers\API\CommitteeController;
use App\Http\Controllers\API\EventLocationController;
use App\Http\Controllers\API\EventController;
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

Route::group(['middleware' => 'api', 'prefix' => 'auth'], function ($router) {
    Route::get('/user', [AuthController::class, 'user'])->name('user');
    Route::post('/register', [AuthController::class, 'register']);
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/token-refresh', [AuthController::class, 'refresh']);
    Route::post('/signout', [AuthController::class, 'signout']);
});

Route::group(['prefix'=>'roles'], function ($router) {
    Route::get('/',[RoleController::class, 'index'])->name('roles.index');
    Route::get('/{id}/show',[RoleController::class, 'show'])->name('roles.show');
});

Route::group(['prefix'=>'users'], function ($router) {
    Route::get('/',[UserController::class, 'index'])->name('users.index');
    Route::post('/store',[UserController::class, 'store'])->name('users.store');
    Route::get('/{id}/edit',[UserController::class, 'edit'])->name('users.edit');
    Route::put('/{id}/update',[UserController::class, 'update'])->name('users.update');
    Route::get('/{id}/delete',[UserController::class, 'delete'])->name('users.delete');
    Route::get('/{id}/show',[UserController::class, 'show'])->name('users.show');
    Route::get('/getAllCommitteeAdmins', [UserController::class, 'getAllCommitteeAdmins'])->name('users.getAllCommitteeAdmins');
});

Route::group(['prefix'=>'committees'], function ($router) {
    Route::get('/',[CommitteeController::class, 'index'])->name('committees.index');
    Route::post('/store',[CommitteeController::class, 'store'])->name('committees.store');
    Route::get('/{id}/edit',[CommitteeController::class, 'edit'])->name('committees.edit');
    Route::put('/{id}/update',[CommitteeController::class, 'update'])->name('committees.update');
    Route::get('/{id}/delete',[CommitteeController::class, 'delete'])->name('committees.delete');
    Route::get('/{id}/show',[CommitteeController::class, 'show'])->name('committees.show');
});

Route::group(['prefix'=>'event-locations'], function ($router) {
    Route::get('/',[EventLocationController::class, 'index'])->name('event-locations.index');
    Route::post('/store',[EventLocationController::class, 'store'])->name('event-locations.store');
    Route::get('/{id}/edit',[EventLocationController::class, 'edit'])->name('event-locations.edit');
    Route::put('/{id}/update',[EventLocationController::class, 'update'])->name('event-locations.update');
    Route::get('/{id}/delete',[EventLocationController::class, 'delete'])->name('event-locations.delete');
    Route::get('/{id}/show',[EventLocationController::class, 'show'])->name('event-locations.show');
});

Route::group(['prefix'=>'events'], function ($router) {
    Route::get('/',[EventController::class, 'index'])->name('events.index');
    Route::post('/store',[EventController::class, 'store'])->name('events.store');
    Route::get('/{id}/edit',[EventController::class, 'edit'])->name('events.edit');
    Route::put('/{id}/update',[EventController::class, 'update'])->name('events.update');
    Route::get('/{id}/delete',[EventController::class, 'delete'])->name('events.delete');
    Route::get('/{id}/show',[EventController::class, 'show'])->name('events.show');
    Route::get('/{id}/approve',[EventController::class, 'approveEvent'])->name('events.approveEvent');
});
