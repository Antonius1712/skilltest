<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\homeController;
use App\Http\Controllers\karyawansController;
use App\Http\Controllers\Api\karyawanController;

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

// Route::get('/', function () {
//     return view('welcome');
// });
route::post('/submitData', [karyawansController::class,'submitData']);
route::resource('/', homeController::class);

Route::group(['prefix' => 'api', 'namespace'=>'Api'], function(){
    Route::post('submit-data-karyawan',[karyawanController::class, 'submitData']);
    Route::get('show-data-karyawan', [karyawanController::class, 'showData']);
    Route::get('show-data-karyawan/{id}', [karyawanController::class, 'showData']);
    Route::post('update-data-karyawan', [karyawanController::class, 'updateData']);
    Route::post('delete-data-karyawan', [karyawanController::class, 'deleteData']);
});
