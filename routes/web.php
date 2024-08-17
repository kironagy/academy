<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

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

//Route::get('/', function () {
//    $course = \App\Models\Course::first();
//    return view('welcome', ['videoUrl' => $course->video_url]);
//});

Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath'],
    ], function () {
        Route::get('/', function () {
            return view('welcome');
        });
        Route::get('/courses', [CourseController::class, 'index'])->name('courses');

        Route::get('/course/{id}', [CourseController::class, 'show'])->name('course.details');
        Route::post('/courses/upload', [\App\Http\Controllers\CourseController::class, 'upload'])->name('courses.upload');
        Route::get('/my-courses', [\App\Http\Controllers\CourseController::class, 'myCourses'])->name('myCourses');

        Route::get('/posts', [PostController::class, 'index'])->name('posts');
        Route::get('/post/{id}', [PostController::class, 'show'])->name('post.details');

        Route::middleware('auth')->group(function () {
            Route::get('/checkout/{course}', [\App\Http\Controllers\PaymentController::class, 'checkout'])->name('checkout');
            Route::get('/payment-success/{course}', [\App\Http\Controllers\PaymentController::class, 'success'])->name('payment.success');
            Route::get('/payment-cancel', [\App\Http\Controllers\PaymentController::class, 'cancel'])->name('payment.cancel');
            //    My Courses
            Route::get('/show/course/{id}', [CourseController::class, 'showCourse'])->name('showCourse')->middleware('paymentCheck');
            Route::post('/addComment/{id}', [CommentController::class, 'addComment'])->name('add.comment');
        });

    });

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
