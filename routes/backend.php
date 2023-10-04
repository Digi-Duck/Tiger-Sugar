<?php

use App\Http\Controllers\BackController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SocialController;
use App\Models\Banner;
use Illuminate\Support\Facades\Route;

// 後端路由
Route::middleware('auth')->prefix('/back')->group(function () {
Route::get('/',[BackController::class, 'index'])->name('back.index'); //後臺首頁
Route::get('reset/',[BackController::class, 'reset'])->name('back.reset'); //修改密碼頁面
Route::post('reset/store/{id}',[BackController::class, 'reset_store'])->name('back.reset.store'); //修改密碼store


// banner路由
Route::get('banner/index',[BannerController::class, 'index'])->name('back.banner.index');
Route::get('banner/create',[BannerController::class, 'create'])->name('back.banner.create');
Route::post('banner/store',[BannerController::class, 'store'])->name('back.banner.store');
Route::get('banner/edit/{id}',[BannerController::class, 'edit'])->name('back.banner.edit');
Route::post('banner/update/{id}',[BannerController::class, 'update'])->name('back.banner.update');
Route::post('banner/delete/{id}',[BannerController::class, 'delete'])->name('back.banner.delete');

// social路由
Route::get('social/index',[SocialController::class,'index'])->name('back.social.index');
Route::get('social/edit',[SocialController::class,'edit'])->name('back.social.edit');
Route::get('social/create',[SocialController::class,'create'])->name('back.social.create');

Route::get('news/index',[NewsController::class, 'index'])->name('back.news.index');

});
