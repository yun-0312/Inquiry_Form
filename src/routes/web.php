<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\Controller;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// お問い合わせフォーム入力ページ
Route::get('/', [ContactController::class, 'index']);

//お問い合わせフォーム確認ページ
Route::post('/confirm', [ContactController::class, 'confirm']);

//サンクスページ
Route::get('/thanks', [ContactController::class, 'complete']);





Route::middleware('auth')->group(function () {
    // Route::get('/confirm', [AuthController::class,]);
});