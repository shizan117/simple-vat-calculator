<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MerchantAuthController;

Route::get('/',[MerchantAuthController::class,'signUpView'])->name('merchant.signUp.view');
Route::post('/merchant-sign-up',[MerchantAuthController::class,'signUp'])->name('merchant.signUp');
Route::get('/sign-in',[MerchantAuthController::class,'MerchantSignIn'])->name('merchant.signIn');
Route::post('/merchant-sign-in',[MerchantAuthController::class,'MerchantLogInCheck'])->name('merchant.checkSignIn');
Route::get('/merchant-sign-out',[MerchantAuthController::class,'MerchantSignOut'])->name('merchant.sign.out');
Route::get('/merchant/dashboard',[DashboardController::class,'index'])->name('dashboard');
Route::get('/vat-calculation',[DashboardController::class,'vat_calculation'])->name('vat-calculation');
