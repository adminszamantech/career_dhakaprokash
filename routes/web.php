<?php

use App\Http\Controllers\Backend\BackendController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Route;

Route::get('/', [FrontendController::class,'home'])->name('home');
Route::post('/career-form-submit', [FrontendController::class,'career_form_submit'])->name('career.formSubmit');

Route::middleware('auth')->group(function () {
    Route::get('/dashboard',[BackendController::class,'dashboard'])->name('dashboard');
    Route::get('/applicants',[BackendController::class,'applicants'])->name('applicants');
    Route::get('/applicant-status',[BackendController::class,'applicantStatus'])->name('applicant.status');
});

//ajax zila lists
Route::get('/get-zila-lists', [FrontendController::class,'get_zila_lists']);
Route::get('/get-upozila-lists/{district_id}', [FrontendController::class,'get_upozila_lists']);
Route::get('/get-university-lists/{id}', [FrontendController::class,'get_university_lists']);

require __DIR__.'/auth.php';

Route::get('/clear', function () {
    Artisan::call('cache:clear'); Artisan::call('config:clear'); Artisan::call('config:cache'); Artisan::call('view:clear'); Artisan::call('route:clear'); Artisan::call('optimize:clear'); Artisan::call('storage:link');
    return "Cleared!";
});
