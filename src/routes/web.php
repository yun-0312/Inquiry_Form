<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\Controller;
use TijsVerkoyen\CssToInlineStyles\CssToInlineStyles;

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
Route::get('/', [ContactController::class, 'index'])->name('contact.index');

//お問い合わせフォーム確認ページ
Route::post('/confirm', [ContactController::class, 'confirm'])->name('contact.confirm');

//サンクスページ
Route::post('/thanks', [ContactController::class, 'send'])->name('contact.send');

//管理画面
Route::middleware('auth')->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');

    //モーダル表示
    Route::get('/admin/contacts/{id}', [AdminController::class, 'show'])->name('admin.show');

    //モーダル内contactテーブル削除
    Route::delete('/admin/{id}', [AdminController::class, 'destroy'])->name('admin.destroy');

    // エクスポート機能
    Route::get('/admin/export', [AdminController::class, 'export'])->name('admin.export');
});


//ログアウト後ログイン画面に遷移
Route::post('/logout', function () {
    Auth::logout();
    request()->session()->invalidate();
    request()->session()->regenerateToken();
    return redirect('/login');
})->name('logout');