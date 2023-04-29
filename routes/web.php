<?php

use App\Http\Controllers\AdmissionController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\LeadController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // Resource Route
    Route::resource('leads', LeadController::class);
    Route::resource('roles', RoleController::class);
    Route::resource('users', UserController::class);

//    Admission Route List
    Route::get('/admission', [AdmissionController::class, 'admission'])->name('admission');
    Route::get('/invoices', [InvoiceController::class, 'index'])->name('invoice-index');
    Route::get('/invoices/{id}', [InvoiceController::class, 'show'])->name('invoice-show');
});

require __DIR__.'/auth.php';
