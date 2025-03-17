<?php

use App\Models\Company;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect('login');
});

Route::get('/dashboard', function () {
    return view('homepage');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/companies', [CompanyController::class, 'index']);
    Route::get('/companies/create', [CompanyController::class, 'create']);
    Route::post('/companies', [CompanyController::class, 'store'])->middleware('auth');
    Route::get('companies/{company}', [CompanyController::class, 'show'])->name('companies.show');
    Route::get('/companies/{company}/edit', [CompanyController::class, 'edit']);
    Route::patch('/companies/{company}', [CompanyController::class, 'update']);
    Route::delete('/companies/{company}', [CompanyController::class, 'destroy']);

    Route::get('/employees', [EmployeeController::class, 'index']);
    Route::get('/employees/create', [EmployeeController::class, 'create']);
    Route::post('/employees', [EmployeeController::class, 'store'])->middleware('auth');
    Route::get('employees/{employee}', [EmployeeController::class, 'show'])->name('employees.show');
    Route::get('/employees/{employee}/edit', [EmployeeController::class, 'edit']);
    Route::patch('/employees/{employee}', [EmployeeController::class, 'update']);
    Route::delete('/employees/{employee}', [EmployeeController::class, 'destroy']);
});

require __DIR__.'/auth.php';
