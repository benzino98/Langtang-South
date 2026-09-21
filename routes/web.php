<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;


use App\Http\Controllers\ContactController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DownloadController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use App\Http\Controllers\PageController;
use App\Http\Controllers\ProjectController;

// Homepage
Route::get('/', [HomeController::class, 'index'])->name('home');

// About Pages
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/about/history', [PageController::class, 'history'])->name('about.history');
Route::get('/about/vision-mission', [PageController::class, 'visionMission'])->name('about.vision-mission');
Route::get('/about/leadership', [PageController::class, 'leadership'])->name('about.leadership');
Route::get('/about/organisational-structure', [PageController::class, 'organisationalStructure'])->name('about.organisational-structure');

// Departments
Route::get('/departments', [DepartmentController::class, 'index'])->name('departments.index');
Route::get('/departments/{slug}', [DepartmentController::class, 'show'])->name('departments.show');

// News
Route::get('/news', [NewsController::class, 'index'])->name('news.index');
Route::get('/news/{slug}', [NewsController::class, 'show'])->name('news.show');

// Projects
Route::get('/projects', [ProjectController::class, 'index'])->name('projects.index');
Route::get('/projects/{slug}', [ProjectController::class, 'show'])->name('projects.show');

// Public Notices
Route::get('/public-notices', [PageController::class, 'notices'])->name('notices.index');

// Downloads
Route::get('/downloads', [DownloadController::class, 'index'])->name('downloads.index');
Route::get('/downloads/{document}', [DownloadController::class, 'download'])->name('downloads.download');

// Gallery
Route::get('/gallery', [GalleryController::class, 'index'])->name('gallery.index');
Route::get('/gallery/{slug}', [GalleryController::class, 'show'])->name('gallery.show');

// Contact Us
Route::get('/contact', [ContactController::class, 'index'])->name('contact.index');
Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

// Global Search
Route::get('/search', [\App\Http\Controllers\SearchController::class, 'index'])->name('search');


Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

// Web-based Artisan Runner (for shared hosting without SSH)
Route::get('/artisan-runner', function (\Illuminate\Http\Request $request) {
    $secretKey = env('ARTISAN_RUNNER_KEY', 'langtang_artisan_secret_2026');
    if ($request->query('key') !== $secretKey) {
        abort(403, 'Unauthorized Artisan Key');
    }

    $action = $request->query('action', 'migrate');
    $output = '';

    try {
        switch ($action) {
            case 'migrate':
                \Illuminate\Support\Facades\Artisan::call('migrate', ['--force' => true]);
                $output = \Illuminate\Support\Facades\Artisan::output();
                break;
            case 'seed':
                \Illuminate\Support\Facades\Artisan::call('db:seed', ['--force' => true]);
                $output = \Illuminate\Support\Facades\Artisan::output();
                break;
            case 'key':
                \Illuminate\Support\Facades\Artisan::call('key:generate', ['--show' => true]);
                $output = \Illuminate\Support\Facades\Artisan::output();
                break;
            case 'link':
                \Illuminate\Support\Facades\Artisan::call('storage:link');
                $output = \Illuminate\Support\Facades\Artisan::output();
                break;
            case 'optimize':
                \Illuminate\Support\Facades\Artisan::call('optimize:clear');
                \Illuminate\Support\Facades\Artisan::call('config:cache');
                \Illuminate\Support\Facades\Artisan::call('route:cache');
                \Illuminate\Support\Facades\Artisan::call('view:cache');
                $output = "Application caches refreshed successfully!";
                break;
            default:
                $output = "Unknown action. Supported actions: migrate, seed, key, link, optimize";
        }
    } catch (\Exception $e) {
        $output = "Error: " . $e->getMessage();
    }

    return response('<pre style="background:#1e293b;color:#38bdf8;padding:20px;font-family:monospace;border-radius:10px;">' . e($output) . '</pre>');
});
