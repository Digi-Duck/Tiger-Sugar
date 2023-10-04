<?php

use App\Http\Controllers\BackController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\SocialController;
use App\Models\Banner;
use Illuminate\Support\Facades\Route;

// 後端路由
Route::middleware('auth')->group(function () {
Route::get('/back',[BackController::class, 'index'])->name('back.index'); //後臺首頁
Route::get('/back/reset/',[BackController::class, 'reset'])->name('back.reset');
Route::post('/back/reset/store/{id}',[BackController::class, 'reset_store'])->name('back.reset.store');


//banner路由
Route::get('/back/banner/index',[BannerController::class, 'index'])->name('back.banner.index');
Route::get('/back/banner/create',[BannerController::class, 'create'])->name('back.banner.create');
Route::post('/back/banner/store',[BannerController::class, 'store'])->name('back.banner.store');
Route::get('/back/banner/edit/{id}',[BannerController::class, 'edit'])->name('back.banner.edit');
Route::post('/back/banner/update/{id}',[BannerController::class, 'update'])->name('back.banner.update');
Route::post('/back/banner/delete/{id}',[BannerController::class, 'delete'])->name('back.banner.delete');
// Route::get('/back/banner/',function () {
//     return view('/backend/banner/create');
// })->name('back.banner');
// Route::post('/back/banner/',function () {
//     return view('/backend/banner/edit');
// })->name('back.banner');
// Route::get('/back/banner/',function () {
//     return view('/backend/banner/index');
// })->name('back.bannindex');

Route::get('/back/social/index',[SocialController::class,'index'])->name('back.social.index');
Route::get('/back/social/edit',[SocialController::class,'edit'])->name('back.social.edit');
Route::get('/back/social/create',[SocialController::class,'create'])->name('back.social.create');

});
