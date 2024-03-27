<?php

use App\Http\Controllers\MediasController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SiteController;
use Illuminate\Http\Request;
use App\Http\Controllers\UserController;
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

Route::get("/users", [UserController::class, "index"]);
Route::post("/users", [UserController::class, "create"]);
Route::post("/sites", [SiteController::class, "store"]);
Route::get("admin/liste/sites", [SiteController::class, "index"]);
Route::post("/medias", [MediasController::class, "store"]);
Route::post("/reservations", [ReservationController::class, "store"]);
Route::get("/reservations", [ReservationController::class, "index"]);
