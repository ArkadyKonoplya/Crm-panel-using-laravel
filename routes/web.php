<?php

use Illuminate\Support\Facades\Route;

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

Auth::routes();

Route::get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/client', [App\Http\Controllers\ClientsController::class, 'index'])->name('client');
Route::post('/create_client', [App\Http\Controllers\ClientsController::class, 'store'])->name('create_client');
Route::post('/edit_client', [App\Http\Controllers\ClientsController::class, 'update'])->name('edit_client');
Route::post('/inactive_client', [App\Http\Controllers\ClientsController::class, 'inactive_client'])->name('inactive_client');
Route::post('/active_client', [App\Http\Controllers\ClientsController::class, 'active_client'])->name('active_client');
Route::post('/delete_client', [App\Http\Controllers\ClientsController::class, 'destroy'])->name('delete_client');


Route::get('/employee', [App\Http\Controllers\EmployeesController::class, 'index'])->name('employee');
Route::post('/create_Employee', [App\Http\Controllers\EmployeesController::class, 'store'])->name('create_Employee');
Route::post('/edit_employee', [App\Http\Controllers\EmployeesController::class, 'update'])->name('edit_employee');
Route::post('/inactive_employee', [App\Http\Controllers\EmployeesController::class, 'inactive_employee'])->name('inactive_employee');
Route::post('/active_employee', [App\Http\Controllers\EmployeesController::class, 'active_employee'])->name('active_employee');
Route::post('/delete_employee', [App\Http\Controllers\EmployeesController::class, 'destroy'])->name('delete_employee');

