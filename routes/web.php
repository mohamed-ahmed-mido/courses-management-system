<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\NotAuthorized;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ReplyController;
use App\Http\Controllers\RoundController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\Auth\UserController;
use App\Http\Controllers\InstructorController;
use App\Http\Controllers\CourseRoundController;
use App\Http\Controllers\NotAuthorizedControler;

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
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [HomeController::class, 'index'])->name('home')->middleware('auth');;

Route::get('/register',[UserController::class, 'register'])->name('register');
Route::get('error',NotAuthorizedControler::class)->name('error');

Route::prefix('users/')->name('users.')->middleware(['auth'])->group(function(){
    Route::get('index',[UserController::class, 'index'])->name('index')->middleware('Instructor');
    Route::get('create',[UserController::class, 'create'])->name('create')->middleware('Admin');
    Route::get('profile',[UserController::class, 'profile'])->name('profile');
    Route::post('change_password',[UserController::class, 'change_password'])->name('change_password');
    Route::post('change_course_round/{id}',[UserController::class, 'change_course_round'])->name('change_course_round')->middleware('Admin');
    Route::post('store',[UserController::class, 'store'])->name('store')->middleware('Admin');
    Route::get('show/{id}',[UserController::class, 'show'])->name('show');
    Route::get('edit/{id}',[UserController::class, 'edit'])->name('edit')->middleware('Admin');
    Route::post('update',[UserController::class, 'update'])->name('update')->middleware('Admin');
    Route::get('destroy/{id}',[UserController::class, 'destroy'])->name('destroy')->middleware('Admin')->middleware('Admin');
});

Route::prefix('courses/')->name('courses.')->middleware(['auth','Instructor'])->group(function(){
Route::get('index',[CourseController::class, 'index'])->name('index');
Route::get('create',[CourseController::class, 'create'])->name('create')->middleware('Admin');
Route::post('store',[CourseController::class, 'store'])->name('store');
Route::get('show/{id}',[CourseController::class, 'show'])->name('show');
Route::get('edit/{id}',[CourseController::class, 'edit'])->name('edit');
Route::post('update/{id}',[CourseController::class, 'update'])->name('update');
Route::get('destroy/{id}',[CourseController::class, 'destroy'])->name('destroy');
});

Route::prefix('rounds/')->name('rounds.')->middleware(['auth','Instructor'])->group(function(){
Route::get('index',[RoundController::class, 'index'])->name('index');
Route::get('create',[RoundController::class, 'create'])->name('create')->middleware('Admin');
Route::post('store',[RoundController::class, 'store'])->name('store')->middleware('Admin');;
Route::get('show/{id}',[RoundController::class, 'show'])->name('show');
Route::get('edit/{id}',[RoundController::class, 'edit'])->name('edit');
Route::post('update/{id}',[RoundController::class, 'update'])->name('update')->middleware('Admin');;
Route::get('destroy/{id}',[RoundController::class, 'destroy'])->name('destroy');
});
Route::prefix('courserounds/')->name('courserounds.')->middleware(['auth','Instructor'])->group(function(){
Route::get('index',[CourseRoundController::class, 'index'])->name('index');
Route::get('create',[CourseRoundController::class, 'create'])->name('create')->middleware('Admin');
Route::post('store',[CourseRoundController::class, 'store'])->name('store');
Route::get('show/{id}',[CourseRoundController::class, 'show'])->name('show');
Route::get('edit/{id}',[CourseRoundController::class, 'edit'])->name('edit');
Route::post('update/{id}',[CourseRoundController::class, 'update'])->name('update');
Route::get('destroy/{id}',[CourseRoundController::class, 'destroy'])->name('destroy')->middleware('Admin');;
Route::get('viewstudents/{id}',[CourseRoundController::class, 'viewstudents'])->name('viewstudents');
Route::get('addstudents/{id}',[CourseRoundController::class, 'addstudents'])->name('addstudents')->middleware('Admin');
Route::post('storestudent/{id}',[CourseRoundController::class, 'storestudent'])->name('storestudent')->middleware('Admin');;
});

Route::prefix('instructors/')->name('instructors.')->middleware(['auth','Admin'])->group(function(){
Route::get('index',[InstructorController::class, 'index'])->name('index');
Route::get('create',[InstructorController::class, 'create'])->name('create');
Route::post('store',[InstructorController::class, 'store'])->name('store');
Route::get('show/{id}',[InstructorController::class, 'show'])->name('show');
Route::get('edit/{id}',[InstructorController::class, 'edit'])->name('edit');
Route::post('update/{id}',[InstructorController::class, 'update'])->name('update');
Route::get('destroy/{id}',[InstructorController::class, 'destroy'])->name('destroy');
});

Route::prefix('admins/')->name('admins.')->middleware(['auth','Admin'])->group(function(){
    Route::get('index',[AdminController::class, 'index'])->name('index');
    Route::get('create',[AdminController::class, 'create'])->name('create');
    Route::post('store',[AdminController::class, 'store'])->name('store');
    Route::get('show/{id}',[AdminController::class, 'show'])->name('show');
    Route::get('edit/{id}',[AdminController::class, 'edit'])->name('edit');
    Route::post('update/{id}',[AdminController::class, 'update'])->name('update');
    Route::get('destroy/{id}',[AdminController::class, 'destroy'])->name('destroy');
    });

Route::prefix('projects/')->name('projects.')->middleware('auth')->group(function(){
Route::get('index',[ProjectController::class, 'index'])->name('index');
Route::get('create',[ProjectController::class, 'create'])->name('create');
Route::post('store',[ProjectController::class, 'store'])->name('store');
Route::get('show/{id}',[ProjectController::class, 'show'])->name('show');
Route::get('edit/{id}',[ProjectController::class, 'edit'])->name('edit');
Route::post('update/{id}',[ProjectController::class, 'update'])->name('update');
Route::get('destroy/{id}',[ProjectController::class, 'destroy'])->name('destroy');
Route::get('download/{id}',[ProjectController::class, 'download'])->name('download');
});

Route::prefix('replies/')->name('replies.')->middleware('auth')->group(function(){
Route::get('index',[ReplyController::class, 'index'])->name('index');
Route::get('create/{project_id}',[ReplyController::class, 'create'])->name('create');
Route::post('store/{project_id}',[ReplyController::class, 'store'])->name('store');
Route::get('show/{id}',[ReplyController::class, 'show'])->name('show');
Route::get('edit/{id}',[ReplyController::class, 'edit'])->name('edit');
Route::post('update/{id}',[ReplyController::class, 'update'])->name('update');
Route::get('destroy/{id}',[ReplyController::class, 'destroy'])->name('destroy');
Route::get('download/{id}',[ReplyController::class, 'download'])->name('download');
});



