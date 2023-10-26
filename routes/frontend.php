<?php

use App\Http\Controllers\FrontController;
use App\Http\Controllers\FrontEnController;
use Illuminate\Support\Facades\Route;

// 前端路由
Route::get('/', [FrontController::class, 'index'])->name('front.index'); //首頁
Route::get('/distribution', [FrontController::class, 'distribution'])->name('front.distribution'); //產品經銷頁
Route::get('/distribution-confirm', [FrontController::class, 'distributionConfirm'])->name('front.distribution_confirm'); //經銷確認頁
Route::post('/distribution-confirm/store', [FrontController::class, 'distributionConfirmStore'])->name('front.distribution_confirm.store');
Route::get('/franchisee', [FrontController::class, 'franchisee'])->name('front.franchisee'); //加盟說明頁
Route::get('/franchisee-form', [FrontController::class, 'franchiseeForm'])->name('front.franchisee_form'); //加盟表單頁
Route::post('/franchisee-form', [FrontController::class, 'franchiseeFormStore'])->name('front.franchisee_form.store');
Route::post('/distribution/add', [FrontController::class, 'add'])->name('front.add'); //商品加入購物車
Route::post('/distribution/add-to-cart',[FrontController::class, 'addToCart'])->name('front.add_to_cart'); //商品加入購物車 打fetch專用路由

//header跳轉到首頁各section的路由
Route::get('#link-about')->name('front.index.about'); //首頁的關於我們section
Route::get('#link-distribution')->name('front.index.distribution'); //首頁的產品經銷section
Route::get('#link-classic')->name('front.index.classic'); //首頁的熱門經典section
Route::get('#link-media')->name('front.index.media'); //首頁的媒體露出section
Route::get('#link-franchisee')->name('front.index.franchisee'); //首頁的加盟專區section


// 英文版前端路由
Route::prefix('/en')->group(function () {
    Route::get('/', [FrontEnController::class, 'index'])->name('front.index.en'); //英文版首頁
    Route::get('/distribution', [FrontEnController::class, 'distribution'])->name('front.distribution.en'); //英文版產品經銷頁
    Route::get('/distribution-confirm', [FrontEnController::class, 'distributionConfirm'])->name('front.distribution_confirm.en'); //經銷確認頁
    Route::get('/franchisee', [FrontEnController::class, 'franchisee'])->name('front.franchisee.en'); //加盟說明頁
    Route::get('/franchisee-form', [FrontEnController::class, 'franchiseeForm'])->name('front.franchisee_form.en'); //加盟表單頁
    Route::post('/franchisee-form/store', [FrontController::class, 'franchiseeFormStore_en'])->name('front.franchisee_form_en.store');

    //header跳轉到首頁各section的路由
    Route::get('#link-about')->name('front.index.about.en'); //首頁的關於我們section
    Route::get('#link-distribution')->name('front.index.distribution.en'); //首頁的產品經銷section
    Route::get('#link-classic')->name('front.index.classic.en'); //首頁的熱門經典section
    Route::get('#link-media')->name('front.index.media.en'); //首頁的媒體露出section
    Route::get('#link-franchisee')->name('front.index.franchisee.en'); //首頁的加盟專區section
});
