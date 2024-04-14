<?php

use App\Http\Controllers\AdminController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HoteController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MediasController;
use App\Http\Controllers\ReservationController;

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
Route::resource("/sites", SiteController::class);
Route::get("admin/liste/sites", [SiteController::class, "index"]);
Route::resource("/medias", MediasController::class);
Route::post("/reservations", [ReservationController::class, "store"]);
Route::get("/reservations", [ReservationController::class, "index"]);
Route::post("/hote", [HoteController::class, "store"]);
Route::post("/client", [ClientController::class, "store"]);
Route::post("/admin", [AdminController::class, "store"]);
Route::get("/mediaSite/{siteId}",[MediasController::class,"getMediasBySiteId"]);


