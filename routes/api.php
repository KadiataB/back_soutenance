<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HoteController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\MediasController;
use Symfony\Component\Console\Input\Input;
use App\Http\Controllers\PaiementController;
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
Route::get("paiements",[PaiementController::class]);


Route::post('/my-ipn', function (Request $request) {
    $type_event = $request->type_event;
    $custom_field = $request->custom_field;
    $ref_command = $request->ref_command;
    $item_name = $request->item_name;
    $item_price = $request->item_price;
    $devise = $request->devise;
    $command_name = $request->command_name;
    $env = $request->env;
    $token = $request->token;
    $api_key_sha256 = "36f79878caf1aa92670cd6441f1f1d25bf1874ca1aabb4c04a1a247f49d92364";
    $api_secret_sha256 = "f16bad780f06ded2f30fd8ef6cb4384e111e346daa8d90d2b32d59a1037cd439";
    
    $my_api_key = env('36f79878caf1aa92670cd6441f1f1d25bf1874ca1aabb4c04a1a247f49d92364');
    $my_api_secret = env('f16bad780f06ded2f30fd8ef6cb4384e111e346daa8d90d2b32d59a1037cd439');

    if(hash('sha256', $my_api_secret) === $api_secret_sha256 && hash('sha256', $my_api_key) === $api_key_sha256)
    {
        //from PayTech
        return "success";
    }
    else{
        //not from PayTech
        return "error";



        
    }
});