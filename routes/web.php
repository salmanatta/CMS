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
Auth::routes();
    Route::resource('department',DepartmentController::class);
    Route::get('/', [DashboardController::class , 'showDashboard']);
    Route::get('deptSearch',[DepartmentController::class,'search']);
//    Section Routes
    Route::get('section',[DepartmentController::class,'showSection'])->name('section');
    Route::get('addSection',[DepartmentController::class,'createSection']);
    Route::post('insertSection',[DepartmentController::class,'insertSection']);
    Route::get('editSection/{section}',[DepartmentController::class,'editSection']);
    Route::PATCH('updateSection/{section}',[DepartmentController::class,'updateSection']);
// End Section Routes

//Route::get('addTicket',[DashboardController::class,'addTicket']);
    Route::get('tickets',[TicketsController::class,'index']);
    Route::get('ticketList',[TicketsController::class,'showTickets'])->name('showTickets');
    Route::post('getSection',[TicketsController::class,'getSection']);
    Route::post('insertTicket',[TicketsController::class,'insertTicket']);
    Route::get('editTicket/{tickets}',[TicketsController::class,'editTicket']);
    Route::post('insertComment',[TicketsController::class,'insertComment']);
        Route::get('showTicketLog',[TicketsController::class,'ticketLog']);

//});

Route::post('loginDashobard',[DashboardController::class,'loginAuth']);
Route::get('dashboard',[DashboardController::class,'dashboard']);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
