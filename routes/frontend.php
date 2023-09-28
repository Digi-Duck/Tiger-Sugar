<?php

use App\Http\Controllers\FrontController;
use Illuminate\Support\Facades\Route;

// 前端路由
Route::get('/index', [FrontController::class, 'index'])->name('front.index'); //首頁
Route::get('/distribution', [FrontController::class, 'distribution'])->name('front.distribution'); //產品經銷頁
Route::get('/distribution-confirm', [FrontController::class, 'distributionConfirm'])->name('front.distribution_confirm'); //經銷確認頁
Route::get('/franchisee', [FrontController::class, 'franchisee'])->name('front.franchisee'); //加盟說明頁
Route::get('/franchisee-form', [FrontController::class, 'franchiseeForm'])->name('front.franchisee_form'); //加盟表單頁

//header跳轉到首頁各section的路由
Route::get('index#link-about', [FrontController::class, 'indexToAbout'])->name('front.index.about'); //首頁的關於我們section
Route::get('index#link-distribution', [FrontController::class, 'indexToDistribution'])->name('front.index.distribution'); //首頁的產品經銷section
Route::get('index#link-classic', [FrontController::class, 'indexToClassic'])->name('front.index.classic'); //首頁的熱門經典section
Route::get('index#link-media', [FrontController::class, 'indexToMedia'])->name('front.index.media'); //首頁的媒體露出section
Route::get('index#link-franchisee', [FrontController::class, 'indexToFranchisee'])->name('front.index.franchisee'); //首頁的加盟專區section
