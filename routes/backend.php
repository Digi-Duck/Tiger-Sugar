<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\BackController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\BlogNewsController;
use App\Http\Controllers\DistributionController;
use App\Http\Controllers\DrinkController;
use App\Http\Controllers\DrinkTypeController;
use App\Http\Controllers\FranchiseExplainController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\ProductsController;
use App\Http\Controllers\ProductsTypeController;
use App\Http\Controllers\SocialController;
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
        Route::delete('/delete', [BannerController::class, 'delete'])->name('back.banner.delete');
    });


    // area據點管理-洲 設定  此葉面不確定有沒有用，晚點處理
    // Route::prefix('/area')->group(function () {
    //     Route::get('/index', [AreaController::class, 'index'])->name('back.area.index');
    // });

    // 據點管理-國家管理


    // 據點管理-城市管理


    // 據點管理-店鋪管理


    // 菜單管理(中)-飲品類型管理
    Route::prefix('/drink_type')->group(function () {
        Route::get('/index', [DrinkTypeController::class, 'index'])->name('back.drink_type.index');
        Route::get('/create', [DrinkTypeController::class, 'create'])->name('back.drink_type.create');
        Route::post('/store', [DrinkTypeController::class, 'store'])->name('back.drink_type.store');
        Route::get('/edit/{id}', [DrinkTypeController::class, 'edit'])->name('back.drink_type.edit');
        Route::post('/update/{id}', [DrinkTypeController::class, 'update'])->name('back.drink_type.update');
        Route::post('/delete/{id}', [DrinkTypeController::class, 'delete'])->name('back.drink_type.delete');
    });

    // 菜單管理(中)-飲品管理
    Route::prefix('/drink')->group(function () {
        Route::get('/index', [DrinkController::class, 'index'])->name('back.drink.index');
        Route::get('/create', [DrinkController::class, 'create'])->name('back.drink.create');
        Route::post('/store', [DrinkController::class, 'store'])->name('back.drink.store');
        Route::get('/edit/{id}', [DrinkController::class, 'edit'])->name('back.drink.edit');
        Route::post('/update/{id}', [DrinkController::class, 'update'])->name('back.drink.update');
        Route::post('/delete/{id}', [DrinkController::class, 'delete'])->name('back.drink.delete');
    });

    // 菜單管理(英)-飲品類型管理
    Route::prefix('/drink_type_en')->group(function () {
        Route::get('/index', [DrinkTypeEnController::class, 'index'])->name('back.drink_type_en.index');
        Route::get('/create', [DrinkTypeEnController::class, 'create'])->name('back.drink_type_en.create');
        Route::post('/store', [DrinkTypeEnController::class, 'store'])->name('back.drink_type_en.store');
        Route::get('/edit/{id}', [DrinkTypeEnController::class, 'edit'])->name('back.drink_type_en.edit');
        Route::post('/update/{id}', [DrinkTypeEnController::class, 'update'])->name('back.drink_type_en.update');
        Route::post('/delete/{id}', [DrinkTypeEnController::class, 'delete'])->name('back.drink_type_en.delete');
    });

    // 菜單管理(英)-飲品管理
    Route::prefix('/drink_en')->group(function () {
        Route::get('/index', [DrinkEnController::class, 'index'])->name('back.drink_en.index');
        Route::get('/create', [DrinkEnController::class, 'create'])->name('back.drink_en.create');
        Route::post('/store', [DrinkEnController::class, 'store'])->name('back.drink_en.store');
        Route::get('/edit/{id}', [DrinkEnController::class, 'edit'])->name('back.drink_en.edit');
        Route::post('/update/{id}', [DrinkEnController::class, 'update'])->name('back.drink_en.update');
        Route::post('/delete/{id}', [DrinkEnController::class, 'delete'])->name('back.drink_en.delete');
    });

    // 媒體露出
    Route::prefix('/media')->group(function () {
        Route::get('index', [MediaController::class, 'index'])->name('back.media.index');
        Route::get('create', [MediaController::class, 'create'])->name('back.media.create');
        Route::post('store', [MediaController::class, 'store'])->name('back.media.store');
        Route::get('edit/{id}', [MediaController::class, 'edit'])->name('back.media.edit');
        Route::post('update/{id}', [MediaController::class, 'update'])->name('back.media.update');
    });


    // 加盟來信


    // distribution 經銷來信
    Route::get('distribution/index', [DistributionController::class, 'index'])->name('back.distribution.index');

    // 媒體報導
    Route::prefix('/blog_news')->group(function () {
        Route::get('index', [BlogNewsController::class, 'index'])->name('back.blog_new.index');
        Route::get('create', [BlogNewsController::class, 'create'])->name('back.blog_new.create');
        Route::post('store', [BlogNewsController::class, 'store'])->name('back.blog_new.store');
        Route::get('edit/{id}', [BlogNewsController::class, 'edit'])->name('back.blog_new.edit');
        Route::post('update/{id}', [BlogNewsController::class, 'update'])->name('back.blog_new.update');
    });

    // 商品管理 （商品類型管理）
    Route::prefix('/products_type')->group(function () {
        Route::get('index', [ProductsTypeController::class, 'index'])->name('back.products_type.index');
        Route::get('create', [ProductsTypeController::class, 'create'])->name('back.products_type.create');
        Route::post('store', [ProductsTypeController::class, 'store'])->name('back.products_type.store');
        Route::get('edit/{id}', [ProductsTypeController::class, 'edit'])->name('back.products_type.edit');
        Route::post('update/{id}', [ProductsTypeController::class, 'update'])->name('back.products_type.update');
    });

    // 商品管理 （商品管理）
    Route::prefix('/products')->group(function () {
        Route::get('index', [ProductsController::class, 'index'])->name('back.products.index');
        Route::get('create', [ProductsController::class, 'create'])->name('back.products.create');
        Route::post('store', [ProductsController::class, 'store'])->name('back.products.store');
        Route::get('edit/{id}', [ProductsController::class, 'edit'])->name('back.products.edit');
        Route::post('update/{id}', [ProductsController::class, 'update'])->name('back.products.update');
    });

    // franchise_explain常見問題管理
    Route::prefix('/franchise_explain')->group(function () {
        Route::get('index', [FranchiseExplainController::class, 'index'])->name('back.franchise_explain.index');
        Route::get('create', [FranchiseExplainController::class, 'create'])->name('back.franchise_explain.create');
        Route::post('store', [FranchiseExplainController::class, 'store'])->name('back.franchise_explain.store');
    });
});
