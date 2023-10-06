<?php

use App\Http\Controllers\BackController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\DistributionController;
use App\Http\Controllers\FranchiseExplainController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\SocialController;
use App\Models\Banner;
use Illuminate\Support\Facades\Route;

// 後端路由
Route::middleware('auth')->prefix('/back')->group(function () {
    Route::get('/', [BackController::class, 'index'])->name('back.index'); //後臺首頁
    Route::get('reset/', [BackController::class, 'reset'])->name('back.reset'); //修改密碼頁面
    Route::post('reset/store/{id}', [BackController::class, 'reset_store'])->name('back.reset.store'); //修改密碼store

    // news最新消息
    Route::get('news/index', [NewsController::class, 'index'])->name('back.news.index');
    Route::get('news/create', [NewsController::class, 'create'])->name('back.news.create');
    Route::post('news/store', [NewsController::class, 'store'])->name('back.news.store');
    Route::get('news/edit/{id}', [NewsController::class, 'edit'])->name('back.news.edit');
    Route::post('news/update/{id}', [NewsController::class, 'update'])->name('back.news.update');
    Route::delete('news/delete', [NewsController::class, 'delete'])->name('back.news.delete');

    // social社群回饋
    Route::get('social/index', [SocialController::class, 'index'])->name('back.social.index');
    Route::get('social/edit', [SocialController::class, 'edit'])->name('back.social.edit');
    Route::get('social/create', [SocialController::class, 'create'])->name('back.social.create');
    Route::post('social/store', [SocialController::class, 'store'])->name('back.social.store');
    Route::get('social/edit/{id}', [SocialController::class, 'edit'])->name('back.social.edit');
    Route::post('social/update/{id}', [SocialController::class, 'update'])->name('back.social.update');
    Route::post('social/delete/{id}', [SocialController::class, 'delete'])->name('back.social.delete');

    // banner廣告橫幅
    Route::get('banner/index', [BannerController::class, 'index'])->name('back.banner.index');
    Route::get('banner/create', [BannerController::class, 'create'])->name('back.banner.create');
    Route::post('banner/store', [BannerController::class, 'store'])->name('back.banner.store');
    Route::get('banner/edit/{id}', [BannerController::class, 'edit'])->name('back.banner.edit');
    Route::post('banner/update/{id}', [BannerController::class, 'update'])->name('back.banner.update');
    Route::post('banner/delete/{id}', [BannerController::class, 'delete'])->name('back.banner.delete');




    // distribution 經銷來信
    Route::get('distribution/index', [DistributionController::class, 'index'])->name('back.distribution.index');

    // franchise_explain常見問題管理
    Route::get('franchise_explain/index', [FranchiseExplainController::class, 'index'])->name('back.franchise_explain.index');
    Route::get('franchise_explain/create', [FranchiseExplainController::class, 'create'])->name('back.franchise_explain.create');
});
