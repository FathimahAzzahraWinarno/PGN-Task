<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SpendingController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('auth/login');
});

Route::resource('departments', DepartmentController::class);

Route::resource('employees', EmployeeController::class);

Route::resource('spendings', SpendingController::class);

Route::get('/spending-report', [ReportController::class, 'index'])->name('spending.report');

Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/report', [ReportController::class, 'index'])->name('reports.index');
Route::get('/report/export/excel', [ReportController::class, 'exportExcel'])->name('reports.export.excel');
Route::get('/report/export/pdf', [ReportController::class, 'exportPdf'])->name('reports.export.pdf');
