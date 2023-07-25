<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\ApiController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;
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




Route::get('show-courses/{student}', [StudentController::class, 'showCourses']);


// student
Route::get('/', [StudentController::class, 'index']);
Route::get('create-student', [StudentController::class, 'create']);
Route::post('store-student', [StudentController::class, 'store']);
Route::get('edit-student/{id}', [StudentController::class, 'edit']);
Route::post('update-student/{student}', [StudentController::class, 'update']);
Route::delete('delete-student/{student}', [StudentController::class, 'destroy']);

// course
Route::get('courses', function () {
    return view('courses');
});
Route::get('create-course', [CourseController::class, 'create']);
Route::post('store-course', [CourseController::class, 'store']);
Route::get('edit-course/{id}', [CourseController::class, 'edit']);
Route::post('update-course/{course}', [CourseController::class, 'update']);
Route::delete('delete-course/{course}', [CourseController::class, 'destroy']);


