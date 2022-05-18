<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\CourseController;
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


Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'processLogin'])->name('process_login');

Route::group([
    'middleware' => 'admin',
], function() {
    Route::group(['prefix' => 'students', 'as' => 'student.'], function () {
        Route::get('/', [StudentController::class, 'index'])->name('index');
        Route::get('/create', [StudentController::class, 'create'])->name('create');
        Route::post('/create', [StudentController::class, 'store'])->name('store');
        Route::delete('/destroy/{student}', [StudentController::class, 'destroy'])->name('destroy');
        Route::get('/edit/{student}', [StudentController::class, 'edit'])->name('edit');
        Route::put('/update/{student}', [StudentController::class, 'update'])->name('update');
    
    });
    
    Route::get('/courses/api', [CourseController::class, 'api'])->name('courses.api');
    
    Route::group(['prefix' => 'courses', 'as' => 'course.'], function () {
        Route::get('/', [CourseController::class, 'index'])->name('index');
        Route::get('/create', [CourseController::class, 'create'])->name('create');
        Route::post('/create', [CourseController::class, 'store'])->name('store');
        Route::delete('/destroy/{course}', [CourseController::class, 'destroy'])->name('destroy')->middleware('superadmin');
        Route::get('/edit/{course}', [CourseController::class, 'edit'])->name('edit');
        Route::put('/update/{course}', [CourseController::class, 'update'])->name('update');
    });
    
    Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

});

    Route::get('/', function () {
        return view('layout.master');
    });