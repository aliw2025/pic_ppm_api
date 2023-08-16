<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\ServiceCategoryController;
use App\Http\Controllers\AssetController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\WorkOrderController;

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

Route::group(['prefix'=>'department'], function(){

   // Route::get('/create', [\App\Http\Controllers\Controller::class,'addDepartment'])->name('add-department');
   Route::get('/', function(){
      return "Route";
   });
  
});


Route::middleware('auth')->get('/', function () {
   return view('layout.main');
})->name('index');
Route::get('/admin-panel', [\App\Http\Controllers\Controller::class,'adminPanel'])->name('admin-panel');

// Route::get('/add-asset', [\App\Http\Controllers\Controller::class,'addAsset'])->name('add-asset');
// Route::get('/add-vendor', [\App\Http\Controllers\Controller::class,'addVendor'])->name('add-vendor');
Route::get('/add-work-order', [\App\Http\Controllers\Controller::class,'addWorkOrder'])->name('add-work-order');
Route::get('/vendors', [\App\Http\Controllers\Controller::class,'vendors'])->name('vendors');
Route::get('/ppm-detail', [\App\Http\Controllers\Controller::class,'ppmDetail'])->name('ppm-detail');
Route::get('/gp-detail', [\App\Http\Controllers\Controller::class,'gpDetail'])->name('gp-detail');

Route::get('/ppm-list', [\App\Http\Controllers\Controller::class,'ppmList'])->name('ppm-list');
Route::get('/wo-list', [\App\Http\Controllers\Controller::class,'woList'])->name('wo-list');
Route::get('/asset-list', [\App\Http\Controllers\Controller::class,'assetList'])->name('asset-list');
// Route::get('/add-department', [\App\Http\Controllers\Controller::class,'addDepartment'])->name('add-department');
Route::get('/service-categories', [\App\Http\Controllers\Controller::class,'serviceCategories'])->name('service-categories');
Route::get('/define-sla', [\App\Http\Controllers\Controller::class,'defineSla'])->name('define-sla');

Route::get('/calender', [\App\Http\Controllers\Controller::class,'calender'])->name('Calender');

// chartOfAccountController   
Route::controller(ServiceCategoryController::class)->prefix('service-category')->group( function () {

   Route::get('/department-wise', 'deptServiceCategories')->name('dept-service-categories');
  
});

Route::controller(VendorController::class)->prefix('vendors')->group( function () {

   Route::get('/vendors-list', 'vendorsList')->name('vendors-list');
   Route::post('/store-contact-person', 'storeContactPerson')->name('store-contact-person');

  
});

Route::controller(AssetController::class)->prefix('asset')->group( function () {

   Route::get('/asset-list', 'assetsList')->name('assets-list');
   Route::get('/select-asset/{id}', 'selectAsset')->name('select-asset');
   Route::get('/get-asset-details', 'getAssetDetails')->name('get-asset-details');
   Route::post('/update-images', 'updateImages')->name('update-images');
   Route::post('/delete-images', 'deleteImages')->name('delete-images');
   Route::get('/get-dept-assets', 'getDeptAssets')->name('get-dept-assets');
   Route::post('/finalize-schedule', 'finalizeSchedule')->name('finalize-schedule');
   Route::post('/finalize-ppm', 'finalizePpm')->name('finalize-ppm');

   
});

Route::controller(WorkOrderController::class)->group(function(){

      Route::post('/add-resolution','addResolution')->name('add-resolution');
});





Route::resource('department', DepartmentController::class);
Route::resource('serviceCategory', ServiceCategoryController::class);
Route::resource('asset', AssetController::class);
Route::resource('vendors', VendorController::class);
Route::resource('workOrder', WorkOrderController::class);








Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
