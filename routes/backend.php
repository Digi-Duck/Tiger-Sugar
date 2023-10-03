<?php

use App\Http\Controllers\BackController;
use Illuminate\Support\Facades\Route;

// 後端路由
Route::get('/back',[BackController::class, 'index'])->name('back.index'); //後臺首頁
Route::get('/back/reset/',[BackController::class, 'reset'])->name('back.reset');
Route::post('/back/reset/store/{id}',[BackController::class, 'reset_store'])->name('back.reset.store');
