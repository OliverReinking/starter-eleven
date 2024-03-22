<?php


use Inertia\Inertia;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ApplicationController;

// --------
// Homepage
// --------
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


// ------------------
// Authentifizierzung
// ------------------

// ===============================
// Routen für angemeldete Anwender
// ===============================
Route::middleware(['auth:sanctum', 'verified'])->group(function () {
    // =================
    // APPLICATIONSWITCH
    // =================
    Route::get('/applicationswitch', [ApplicationController::class, 'index'])->name('applicationswitch');
});


// --------------
// Fallback-Route
// --------------
Route::fallback(function () {
    return Inertia::render('Homepage/NoPageFound');
});
