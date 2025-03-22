<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\EmployeeController;


Route::get('login',[LoginController::class, 'showLoginPage'])->name('login');
Route::post('login',[LoginController::class, 'login'])->name('admin.login');

Route::get('/',[DashboardController::class, 'dashboard'])->name('home');


// ===== TICKET =====
Route::get('add/ticket',[TicketController::class, 'create'])->name('add.ticket');
Route::get('ticket/list',[TicketController::class, 'index'])->name('ticket.list');
Route::post('ticket/store',[TicketController::class, 'store'])->name('ticket.store');
Route::get('ticket/edit/{id}',[TicketController::class, 'edit'])->name('ticket.edit');
Route::get('ticket/delete/{id}',[TicketController::class, 'destroy'])->name('ticket.delete');
Route::post('ticket/update/{id}',[TicketController::class, 'update'])->name('ticket.update');

// ===== EMPLOYEE =====
Route::get('add/employee',[EmployeeController::class, 'create'])->name('add.employee');
Route::get('employee/list',[EmployeeController::class, 'index'])->name('employee.list');
Route::post('employee/store',[EmployeeController::class, 'store'])->name('employee.store');
Route::get('edit/employee/{id}',[EmployeeController::class, 'edit'])->name('edit.employee');
Route::post('update/employee/{id}',[EmployeeController::class, 'update'])->name('update.employee');
Route::get('delete/employee/{id}',[EmployeeController::class, 'destroy'])->name('delete.employee');

// ===== USER =====
Route::get('add/user',[UserController::class, 'create'])->name('add.user');
Route::get('user/list',[UserController::class, 'index'])->name('user.list');
Route::get('edit/user/{id}',[UserController::class, 'edit'])->name('edit.user');
Route::post('user/store',[UserController::class, 'store'])->name('user.store');
Route::post('user/update/{id}',[UserController::class, 'update'])->name('user.update');
Route::get('user/delete/{id}',[UserController::class, 'destroy'])->name('user.delete');
