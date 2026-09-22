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

// Web-based Artisan Runner (for shared hosting without SSH access)
Route::get('/artisan-runner', function (\Illuminate\Http\Request $request) {
    $secretKey = env('ARTISAN_RUNNER_KEY', 'langtang_artisan_secret_2026');
    $key = $request->query('key');

    $baseUrl = url('/artisan-runner') . '?key=' . $secretKey;

    // Show dashboard if no key or no action
    if ($key !== $secretKey) {
        abort(403, 'Unauthorized. Provide ?key=YOUR_SECRET in the URL.');
    }

    $action = $request->query('action');

    // Show dashboard when no action is specified
    if (!$action) {
        $actions = [
            'post-deploy'   => 'Run ALL post-deploy tasks (migrate + cache + optimize)',
            'migrate'       => 'Run database migrations',
            'seed'          => 'Run database seeders',
            'key'           => 'Generate and display a new APP_KEY',
            'link'          => 'Create storage symlink',
            'cache-clear'   => 'Clear all caches (config, route, view)',
            'optimize'      => 'Cache config, routes and views',
        ];

        $html = '<html><head><title>Artisan Runner</title>
        <style>
            body { font-family: monospace; background: #0f172a; color: #e2e8f0; padding: 40px; }
            h1 { color: #38bdf8; margin-bottom: 5px; }
            p { color: #94a3b8; margin-bottom: 30px; }
            a { display: block; background: #1e293b; color: #7dd3fc; padding: 14px 20px;
                margin: 8px 0; border-radius: 8px; text-decoration: none; border: 1px solid #334155; }
            a:hover { background: #334155; color: #38bdf8; }
            .badge { float: right; font-size: 12px; color: #64748b; }
            .highlight { border-color: #0ea5e9; color: #38bdf8; }
        </style></head><body>
        <h1>🚀 Artisan Runner</h1>
        <p>Langtang South LGA — Post-Deploy Management</p>';

        foreach ($actions as $cmd => $desc) {
            $cls = $cmd === 'post-deploy' ? ' class="highlight"' : '';
            $html .= "<a href=\"{$baseUrl}&action={$cmd}\"{$cls}>{$desc} <span class=\"badge\">{$cmd}</span></a>";
        }

        $html .= '</body></html>';
        return response($html);
    }

    $output = [];
    $errors = [];

    $run = function (string $command, array $args = []) use (&$output) {
        \Illuminate\Support\Facades\Artisan::call($command, $args);
        $output[] = "$ php artisan {$command}";
        $output[] = trim(\Illuminate\Support\Facades\Artisan::output()) ?: '(no output)';
        $output[] = '';
    };

    try {
        switch ($action) {
            case 'post-deploy':
                $run('migrate', ['--force' => true]);
                $run('config:clear');
                $run('config:cache');
                $run('route:clear');
                $run('route:cache');
                $run('view:clear');
                $run('view:cache');
                $run('optimize');
                break;
            case 'migrate':
                $run('migrate', ['--force' => true]);
                break;
            case 'seed':
                $run('db:seed', ['--force' => true]);
                break;
            case 'key':
                $run('key:generate', ['--show' => true]);
                break;
            case 'link':
                $run('storage:link');
                break;
            case 'cache-clear':
                $run('config:clear');
                $run('route:clear');
                $run('view:clear');
                $run('cache:clear');
                break;
            case 'optimize':
                $run('config:cache');
                $run('route:cache');
                $run('view:cache');
                $run('optimize');
                break;
            default:
                $output[] = "Unknown action: {$action}";
        }
    } catch (\Exception $e) {
        $errors[] = $e->getMessage();
    }

    $baseUrl = url('/artisan-runner') . '?key=' . $secretKey;
    $outputText = implode("\n", $output);
    $errorText  = implode("\n", $errors);
    $status     = empty($errors) ? '✅ Completed successfully' : '❌ Completed with errors';
    $color      = empty($errors) ? '#4ade80' : '#f87171';

    return response("
    <html><head><title>Artisan Runner — {$action}</title>
    <style>
        body { font-family: monospace; background: #0f172a; color: #e2e8f0; padding: 40px; }
        h1 { color: #38bdf8; } h2 { color: {$color}; margin-top: 0; }
        pre { background: #1e293b; padding: 20px; border-radius: 8px; white-space: pre-wrap; line-height: 1.6; }
        .err { color: #f87171; } a { color: #7dd3fc; }
    </style></head><body>
    <h1>🚀 Artisan Runner</h1>
    <h2>{$status}</h2>
    <p>Action: <strong>{$action}</strong> | <a href='{$baseUrl}'>← Back to dashboard</a></p>
    <pre>" . e($outputText) . "</pre>" .
    (!empty($errorText) ? "<pre class='err'>" . e($errorText) . "</pre>" : "") .
    "</body></html>");
});
