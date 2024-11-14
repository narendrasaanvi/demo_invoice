<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\ChangePasswordController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\ExportController;
use App\Http\Controllers\Admin\ReportController;
use App\Http\Controllers\Frontend\HomeController;



Route::get('admin/dashboard', [HomeController::class, 'index'])->name('home');





//ADMIN PANEL
Route::middleware(['Admin', 'auth', 'verified'])->prefix('/admin')->group(function () {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.index');
    Route::get('change-password', [ChangePasswordController::class, 'index'])->name('admin.change-password');
    Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');

    //Invoice Route
    Route::get('/invoice', [InvoiceController::class, 'index'])->name('admin.invoice.index');
    Route::post('/invoice', [InvoiceController::class, 'store'])->name('admin.invoice.store');
    Route::get('/invoice/view', [InvoiceController::class, 'view'])->name('admin.invoice.view');
    Route::delete('/invoice/remove/{id}', [InvoiceController::class, 'destroy'])->name('admin.invoice.destroy');
    Route::get('/invoice/pdf/{id}', [InvoiceController::class, 'downloadpdf'])->name('admin.invoice.pdf');
    Route::get('export', [ExportController::class, 'export']);
    Route::get('report-month', [ReportController::class, 'reportmonth'])->name('admin.report.month');
    Route::POST('report-month', [ReportController::class, 'reportmonthview'])->name('admin.report.month.view');
    Route::get('report-date', [ReportController::class, 'reportdate'])->name('admin.report.date');
    Route::POST('report-date', [ReportController::class, 'reportdateview'])->name('admin.report.date.view');


    Route::get('/customers', [InvoiceController::class, 'customersearch'])->name('customers.search');
    Route::get('/customers/{id}', [InvoiceController::class, 'customershow'])->name('customers.show');
});


require __DIR__ . '/auth.php';
