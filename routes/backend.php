<?php

use App\Http\Controllers\BackController;
use Illuminate\Support\Facades\Route;

// 後端路由
Route::get('/back',[BackController::class, 'index'])->name('back.index'); //後臺首頁

