<?php

use App\Models\Company;
use App\Http\Controllers\CompanyController;
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
    //Route::get('/companies/{company}', [CompanyController::class, 'show']);
    Route::get('/companies/{company}/edit', [CompanyController::class, 'edit']);

    Route::patch('/companies/{company}', [CompanyController::class, 'update']);
    Route::delete('/companies/{company}', [CompanyController::class, 'destroy']);
});

require __DIR__.'/auth.php';
