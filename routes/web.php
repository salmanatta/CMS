<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\TicketsController;
use App\Http\Controllers\FixedAssetsController;

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
    Route::get('read-ticket/{id}/{ticket}',[TicketsController::class,'readNotification']);
    Route::post('insertComment',[TicketsController::class,'insertComment']);
    Route::get('showTicketLog/{tickets}',[TicketsController::class,'ticketLog']);
    Route::get('closeTickets',[TicketsController::class,'showCloseTickets'])->name('closeTickets');
//});

    Route::post('loginDashobard',[DashboardController::class,'loginAuth']);
    Route::get('dashboard',[DashboardController::class,'dashboard']);
    Route::get('user-list',[DashboardController::class,'userList'])->name('user-list');

    Route::get('user-department/{userId}',[DashboardController::class,'userDepartment']);
    Route::post('user-department',[DashboardController::class,'adduserDepartment']);

    Route::get('newUser',[DashboardController::class,'addUser'])->name('newUser');
    Route::post('addUser',[DashboardController::class,'createUser']);

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
// Fixed Assets Routes
Route::get('item-List',[FixedAssetsController::class,'itemList']);
Route::get('add-Item',[FixedAssetsController::class,'addItem']);
Route::post('add-Item',[FixedAssetsController::class,'insertItem']);
Route::post('getFAItem',[FixedAssetsController::class,'getFAItem']);
Route::get('update-assign-to/{id}/{ticketId}',[TicketsController::class,'updateAssignTo']);
Route::get('resolve/{id}',[TicketsController::class,'markResolve']);
Route::get('re-open/{id}',[TicketsController::class,'reOpen']);


// End Fixed Assets Routes
