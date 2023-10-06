<?php

use App\Http\Controllers\AreaController;
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
    Route::get('/reset', [BackController::class, 'reset'])->name('back.reset'); //修改密碼頁面
    Route::post('/reset/store/{id}', [BackController::class, 'reset_store'])->name('back.reset.store'); //修改密碼store

    // news最新消息
    Route::prefix('/news')->group(function () {
        Route::get('/index', [NewsController::class, 'index'])->name('back.news.index');
        Route::get('/create', [NewsController::class, 'create'])->name('back.news.create');
        Route::post('/store', [NewsController::class, 'store'])->name('back.news.store');
        Route::get('/edit/{id}', [NewsController::class, 'edit'])->name('back.news.edit');
        Route::post('/update/{id}', [NewsController::class, 'update'])->name('back.news.update');
        Route::delete('/delete', [NewsController::class, 'delete'])->name('back.news.delete');
    });

    // social社群回饋
    Route::prefix('/social')->group(function () {
        Route::get('/index', [SocialController::class, 'index'])->name('back.social.index');
        Route::get('/edit', [SocialController::class, 'edit'])->name('back.social.edit');
        Route::get('/create', [SocialController::class, 'create'])->name('back.social.create');
    });

    // social社群回饋
    Route::post('/back/social/store', [SocialController::class, 'store'])->name('back.social.store');
    Route::get('/back/social/edit/{id}', [SocialController::class, 'edit'])->name('back.social.edit');
    Route::post('/back/social/update/{id}', [SocialController::class, 'update'])->name('back.social.update');
    Route::post('/back/social/delete/{id}', [SocialController::class, 'delete'])->name('back.social.delete');

    // banner廣告橫幅
    Route::prefix('/banner')->group(function () {
        Route::get('/index', [BannerController::class, 'index'])->name('back.banner.index');
        Route::get('/create', [BannerController::class, 'create'])->name('back.banner.create');
        Route::post('/store', [BannerController::class, 'store'])->name('back.banner.store');
        Route::get('/edit/{id}', [BannerController::class, 'edit'])->name('back.banner.edit');
        Route::post('/update/{id}', [BannerController::class, 'update'])->name('back.banner.update');
        Route::post('/delete/{id}', [BannerController::class, 'delete'])->name('back.banner.delete');
    });


    // area據點管理-洲 設定  此葉面不確定有沒有用，晚點處理
    // Route::prefix('/area')->group(function () {
    //     Route::get('/index', [AreaController::class, 'index'])->name('back.area.index');
    // });

    // 據點管理-國家管理


    // 據點管理-城市管理


    // 據點管理-店鋪管理


    // 菜單管理(中)-飲品類型管理


    // 菜單管理(中)-飲品管理


    // 菜單管理(英)-飲品類型管理


    // 菜單管理(英)-飲品管理


    // 媒體露出


    // 加盟來信


    // distribution 經銷來信
    Route::get('distribution/index', [DistributionController::class, 'index'])->name('back.distribution.index');

    // 媒體報導


    // 商品管理


    // franchise_explain常見問題管理
    Route::get('franchise_explain/index', [FranchiseExplainController::class, 'index'])->name('back.franchise_explain.index');
    Route::get('franchise_explain/create', [FranchiseExplainController::class, 'create'])->name('back.franchise_explain.create');
    Route::post('franchise_explain/store', [FranchiseExplainController::class, 'store'])->name('back.franchise_explain.store');
});
