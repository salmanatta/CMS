<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TicketsController;

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
//route::group(['middleware'=>"web"],function (){
//    Auth::routes();
    Route::resource('department',DepartmentController::class);
    Route::get('/', [DashboardController::class , 'showDashboard']);
    Route::get('deptSearch',[DepartmentController::class,'search']);

//Route::get('addTicket',[DashboardController::class,'addTicket']);
    Route::get('tickets',[TicketsController::class,'index']);
    Route::post('getSection',[TicketsController::class,'getSection']);
    Route::post('insertTicket',[TicketsController::class,'insertTicket']);

//});

Route::post('loginDashobard',[DashboardController::class,'loginAuth']);
Route::get('dashboard',[DashboardController::class,'dashboard']);
