<?php

use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SubscriptionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TestimonialController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');

Route::view('/menu', 'menu.menu')->name('menu');
Route::view('/contact', 'contact.contact')->name('contact');

Route::get('/contact-testimonials', [TestimonialController::class, 'index'])->name('contact.testimonials');
Route::post('/testimonials', [TestimonialController::class, 'store'])->name('testimonials.store');

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('profile')->group(function () {
        Route::get('/', [ProfileController::class, 'edit'])->name('profile.edit');
        Route::patch('/', [ProfileController::class, 'update'])->name('profile.update');
        Route::delete('/', [ProfileController::class, 'destroy'])->name('profile.destroy');
    });

    Route::prefix('subscriptions')->name('subscriptions.')->group(function () {
        Route::get('/', [SubscriptionController::class, 'create'])->name('create');
        Route::post('/', [SubscriptionController::class, 'store'])->name('store');

        Route::post('/{subscription}/pause', [DashboardController::class, 'pauseSubscription'])->name('pause');
        Route::post('/{subscription}/cancel', [DashboardController::class, 'cancelSubscription'])->name('cancel');
        Route::post('/{subscription}/resume', [DashboardController::class, 'resumeSubscription'])->name('resume');
    });

    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'adminDashboard'])->name('dashboard');
    });

    Route::middleware('user')->prefix('user')->name('user.')->group(function () {
        Route::get('/dashboard', [DashboardController::class, 'userDashboard'])->name('dashboard');
    });

    Route::get('/dashboard', function () {
        return redirect()->route(auth()->user()->is_admin ? 'admin.dashboard' : 'user.dashboard');
    })->name('dashboard');
});
