<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\CurriculumController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\BannerController;
use App\Http\Controllers\admin\ForgotPasswordController;
use App\Http\Controllers\admin\LoginController;
use App\Http\Controllers\admin\RegisterController;
use App\Http\Controllers\admin\ResetPasswordController;
use App\Http\Controllers\DeliveryController;
use App\Http\Controllers\TopController;

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



Route::get('/', function () {

    if (Auth::check()) {

        return redirect()->route('curriculum_list');
    }

    return redirect()->route('login');
});

Auth::routes();

Route::prefix('admin')->namespace('Admin')->name('admin')->group(function () {
    Route::view('/login', 'admin/login')->name('login');
    Route::post('/login', [LoginController::class, 'login']);
    Route::post('logout', [LoginController::class, 'logout'])->name('logout');

    Route::view('/register', 'admin/register')->name('register');
    Route::post('/register', [RegisterController::class, 'register']);

    Route::view('/home', 'admin/home')->middleware('auth:admin')->name('home');

    Route::view('/password/reset', 'admin/passwords/email')->name('passwords.reset');
    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::view('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [ResetPasswordController::class, 'reset']);

    Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPasswordForm'])->name('forgot-password');
});

Route::middleware('auth')->group(function () {
    Route::prefix('curriculum')->group(function () {
        Route::get('/curriculum_list', [CurriculumController::class, 'showCurriculumList'])->name('curriculum_list');
        Route::get('/create', [CurriculumController::class, 'showCurriculumCreate'])->name('show.curriculum.create');
        Route::post('/store', [CurriculumController::class, 'store'])->name('curriculum.store');
        Route::get('/edit/{id}', [CurriculumController::class, 'showCurriculumEdit'])->name('show.curriculum.edit');
        Route::put('/update/{id}', [CurriculumController::class, 'update'])->name('curriculum.update');
        Route::get('/grade/{grade_id}', [CurriculumController::class, 'showByGrade'])->name('curriculums.by.grade');
    });

    Route::get('/article_list', [ArticleController::class, 'showArticleList'])->name('article_list');

    Route::get('/banner_edit', [BannerController::class, 'showBannerEdit'])->name('banner_edit');

    Route::prefix('delivery')->group(function () {
        Route::get('/edit/{id}', [DeliveryController::class, 'showDeliveryEdit'])->name('show.delivery.edit');
        Route::put('/update/{id}', [DeliveryController::class, 'update'])->name('update.delivery');
    });


    Route::get('/top', [TopController::class, 'showTop'])->name('show.top');
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
