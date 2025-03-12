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
});

require __DIR__.'/auth.php';
