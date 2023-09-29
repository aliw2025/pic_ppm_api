<?php

use App\Http\Controllers\Api\WorkOrderApiController;
use App\Http\Controllers\Api\AuthController;
use App\Http\Controllers\AssetApiController;
use App\Http\Controllers\AssetController;
// use App\Http\Controllers\Api\AssetApiController;
use App\Http\Controllers\VendorController;
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
Route::controller(VendorController::class)->prefix('Vendor')->group( function () {

    Route::post('/store-contact-person', 'storeContactPerson')->name('Vendor.contact-person');
   
 });

  
Route::controller(AssetController::class)->prefix('Asset')->group( function () {

    Route::get('/create', 'create')->name('Asset.create');
   
 });
 
 
Route::post('/login', [AuthController::class,'login']);

Route::post('/register', [AuthController::class,'register']);
Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});


Route::apiResource('WorkOrder',WorkOrderApiController::class);
// Route::apiResource('Asset', AssetApiController::class);
Route::apiResource('Asset', AssetController::class);
Route::apiResource('Vendor',VendorController::class);

