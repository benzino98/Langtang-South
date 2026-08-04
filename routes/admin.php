<?php

use App\Http\Controllers\Admin\DashboardController;
use Illuminate\Support\Facades\Route;

Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

Route::resource('departments', \App\Http\Controllers\Admin\DepartmentController::class);
Route::resource('leadership', \App\Http\Controllers\Admin\LeadershipController::class);
Route::resource('news-articles', \App\Http\Controllers\Admin\NewsArticleController::class);
Route::resource('news-categories', \App\Http\Controllers\Admin\NewsCategoryController::class);
Route::resource('projects', \App\Http\Controllers\Admin\ProjectController::class);
Route::resource('public-notices', \App\Http\Controllers\Admin\PublicNoticeController::class);
Route::resource('documents', \App\Http\Controllers\Admin\DocumentController::class);
Route::resource('document-categories', \App\Http\Controllers\Admin\DocumentCategoryController::class);
Route::resource('gallery-albums', \App\Http\Controllers\Admin\GalleryAlbumController::class);
Route::resource('gallery-images', \App\Http\Controllers\Admin\GalleryImageController::class);
Route::resource('contact-messages', \App\Http\Controllers\Admin\ContactMessageController::class)->only(['index', 'show', 'destroy']);
Route::resource('users', \App\Http\Controllers\Admin\UserController::class);
Route::get('settings', [\App\Http\Controllers\Admin\SettingController::class, 'edit'])->name('settings.edit');
Route::put('settings', [\App\Http\Controllers\Admin\SettingController::class, 'update'])->name('settings.update');
