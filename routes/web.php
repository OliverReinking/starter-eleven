<?php

use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\HandbookController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\DashboardAdminController;
use App\Http\Controllers\DashboardCentralController;
use App\Http\Controllers\DashboardCustomerController;
use App\Http\Controllers\DashboardEmployeeController;

// ========
// Homepage
// ========
// Startseite
Route::get('/', [HomeController::class, 'home_index'])->name('home.index');
// Get Started
Route::get('/home/get_started', [HomeController::class, 'home_get_started'])->name('home.get_started');
// Pricing
Route::get('/home/pricing', [HomeController::class, 'home_pricing'])->name('home.pricing');
// Imprint
Route::get('/home/imprint', [HomeController::class, 'home_imprint'])->name('home.imprint');
// Privacy
Route::get('/home/privacy', [HomeController::class, 'home_privacy'])->name('home.privacy');
// Terms
Route::get('/home/terms', [HomeController::class, 'home_terms'])->name('home.terms');
// Liste der Blogartikel
Route::get('/blogs', [HomeController::class, 'home_blog_index'])->name('home.blog.index')->middleware('remember');
// Display Blogartikel
Route::get('/blogs/show/{slug}', [HomeController::class, 'home_blog_show'])->name('home.blog.show');

// Anwendung konnte nicht gefunden werden
Route::get('/home/no_application_found', [HomeController::class, 'home_no_application_found'])
    ->name('home.no_application_found');

// Anwender ist kein Administrator
Route::get('/home/user_is_no_admin', [HomeController::class, 'home_user_is_no_admin'])->name('home.user_is_no_admin');
// Anwender ist kein Mitarbeiter
Route::get('/home/user_is_no_employee', [HomeController::class, 'home_user_is_no_employee'])->name('home.user_is_no_employee');
// Anwender ist kein Kunde
Route::get('/home/user_is_no_customer', [HomeController::class, 'home_user_is_no_customer'])->name('home.user_is_no_customer');

// Mail-Verifizierungs-Signatur ist abgelaufen
Route::get('/home/invalid_signature', [HomeController::class, 'home_invalid_signature'])->name('home.invalid_signature');

// ===============================
// Routen für angemeldete Anwender
// ===============================
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // =================
    // APPLICATIONSWITCH
    // =================
    Route::get('/applicationswitch', [ApplicationController::class, 'index'])->name('applicationswitch');

    // =================
    // CENTRAL DASHBOARD
    // =================
    // Central-Dashboard
    Route::get(
        '/central/dashboard',
        [DashboardCentralController::class, 'central_index']
    )->name('central.dashboard');

    // =================
    // APPLICATION ADMIN
    // =================
    Route::middleware(['is_admin'])->group(function () {
        // Dashboard
        Route::get(
            '/admin/dashboard',
            [DashboardAdminController::class, 'admin_index']
        )->name('admin.dashboard');
        // =================
        // Laravel-Log-Datei
        // =================
        // Display Log-Datei
        Route::get('/admin/laravel_log', [\Rap2hpoutre\LaravelLogViewer\LogViewerController::class, 'index'])->name('admin.laravel_log');
        // ========
        // Handbook
        // ========
        Route::get('/admin/handbook', [HandbookController::class, 'admin_handbook'])->name('admin.handbook');
        // =====
        // Blogs
        // =====
        // Liste der Blogartikel (blogs)
        Route::get('/admin/blogs/index', [BlogController::class, 'admin_blog_index'])
            ->name('admin.blog.index')->middleware('remember');
        // Create a new Blogartikel
        Route::get('/admin/blogs/create', [BlogController::class, 'admin_blog_create'])
            ->name('admin.blog.create');
        // Store Blogartikel
        Route::post('/admin/blogs/store', [BlogController::class, 'admin_blog_store'])
            ->name('admin.blog.store');
        // Edit des Blogartikels
        Route::get('/admin/blogs/{blog}/edit', [BlogController::class, 'admin_blog_edit'])
            ->name('admin.blog.edit');
        // Update des Blogartikels
        Route::put('/admin/blogs/{blog}', [BlogController::class, 'admin_blog_update'])
            ->name('admin.blog.update');
        // Blogartikel Delete
        Route::delete('/admin/blogs/{blog}', [BlogController::class, 'admin_blog_delete'])
            ->name('admin.blog.delete');
        // =======
        // Profile
        // =======
        Route::get('/admin/profile', [DashboardAdminController::class, 'admin_profile'])
            ->name('admin.profile');
        // ==========
        // Api-Tokens
        // ==========
        Route::get('/admin/api_tokens', [DashboardAdminController::class, 'admin_api_tokens_index'])
            ->name('admin.api_tokens.index');
    });

    // ====================
    // APPLICATION EMPLOYEE
    // ====================
    Route::middleware(['is_employee'])->group(function () {
        // Dashboard
        Route::get('/employee/dashboard', [DashboardEmployeeController::class, 'employee_index'])
            ->name('employee.dashboard');
    });

    // ====================
    // APPLICATION CUSTOMER
    // ====================
    Route::middleware(['is_customer'])->group(function () {
        // Dashboard
        Route::get('/customer/dashboard', [DashboardCustomerController::class, 'customer_index'])
            ->name('customer.dashboard');
    });
});

// ==============
// Fallback-Route
// ==============
Route::fallback(function () {
    return Inertia::render('Homepage/NoPageFound');
});
