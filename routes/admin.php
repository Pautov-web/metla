<?php

use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\CurrencyController;
use App\Http\Controllers\Admin\CauseController;
use App\Http\Controllers\Admin\LoggerController;
use App\Http\Controllers\Admin\ArticleController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\PrivateFilesController;
use App\Http\Controllers\Admin\FaqController;
use App\Http\Controllers\Admin\FeedbackController;
use App\Http\Controllers\Admin\ReviewController;
use App\Http\Controllers\Admin\ServiceController;
use App\Http\Controllers\Admin\OptionController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth')->group(function () {
    // Админ
    Route::middleware('role:admin-panel')->prefix('crm/admin')->group(function () {
        // Настройки
        Route::get('/', function () {
            return view('admin.dashboard');
        })->name('admin');

        Route::get('/settings', [SettingController::class, 'edit'])->middleware('role:settings')->name('admin.settings');
        Route::post('/settings', [SettingController::class, 'update'])->middleware('role:settings');

        // Роли
        Route::resource('roles', RoleController::class, ['as' => 'admin']);
        
        // Валюты
        Route::resource('currencies', CurrencyController::class, ['as' => 'admin']);

        // Причины удаления аккаунта
        Route::resource('causes', CauseController::class, ['as' => 'admin']);

        // Статьи
        Route::resource('articles', ArticleController::class, ['as' => 'admin']);

        // Пользователи
        Route::resource('users', UserController::class, ['as' => 'admin']);

        // FAQ
        Route::resource('faqs', FaqController::class, ['as' => 'admin']);

        // Вопросы от пользователя
        Route::resource('feedback', FeedbackController::class, ['as' => 'admin'])->except([
            'create', 'store',
        ]);

        // Отзывы
        Route::resource('reviews', ReviewController::class, ['as' => 'admin']);

        // Услуги
        Route::resource('services', ServiceController::class, ['as' => 'admin']);

        // Опции
        Route::resource('options', OptionController::class, ['as' => 'admin']);

        // Логгер
        Route::get('/loggers', [LoggerController::class, 'index'])->middleware('role:logger-view-any')->name('admin.loggers');

        // Получить изображения паспортов
        Route::get('/private/document/{path}', [PrivateFilesController::class, 'get'])->middleware('role:private-files-view')->name('admin.private.file');
    });
});