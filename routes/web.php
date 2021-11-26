<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::prefix('dashboard')->group(function () {
    Route::prefix('admin')->middleware(['is_admin', 'auth'])->group(function () {
        Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

        Route::get('/user/profile', function () {
            // Uses first & second middleware...
        });
    });
    Route::prefix('courses')->group(function () {
        Route::get('/view', [App\Http\Controllers\CourseController::class, 'view_courses'])->name('view-courses');
    });

    Route::prefix('users')->group(function () {
        Route::get('/payments', [App\Http\Controllers\PaymentController::class, 'fetch_my_payments'])->name('my_payments');
    });

    Route::prefix('profile')->group(function () {
        Route::get('/view', [App\Http\Controllers\ProfileController::class, 'fetch_user_details'])->name('view-profile');
        Route::post('/update', [App\Http\Controllers\ProfileController::class, 'update_profile'])->name('update-profile');
        Route::post('/change-password', [App\Http\Controllers\ProfileController::class, 'change_password'])->name('change_password');
    });
});

Route::get('/', [App\Http\Controllers\LandingController::class,'index'])->name('landing-page');

Route::get('/about', [App\Http\Controllers\LandingController::class,'about'])->name('about-page');

Route::get('/contact-us', [App\Http\Controllers\LandingController::class,'contact'])->name('contact-page');

Route::get('/team', [App\Http\Controllers\LandingController::class,'team'])->name('team-page');

Route::get('/jobs', [App\Http\Controllers\LandingController::class,'jobs'])->name('jobs-page');

Route::get('/blog', [App\Http\Controllers\LandingController::class,'blog'])->name('blog-page');

Route::get('/testimonials', [App\Http\Controllers\LandingController::class,'testimonials'])->name('testimonials-page');

Route::get('/terms', [App\Http\Controllers\LandingController::class,'terms'])->name('terms-page');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
