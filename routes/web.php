<?php

use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LogoutController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\ClassController;
use App\Http\Controllers\SubjectController;
use App\Http\Controllers\FeeController;



Auth::routes();

Route::get("/", [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/', [LoginController::class, 'store'])->name('store');

Route::get('/register', [RegisterController::class, 'showRegistrationForm'])->name('register');
Route::post('/register', [RegisterController::class, 'register']);

Route::post('/logout', [LogoutController::class, 'store'])->name('logout');

//Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

//   resource controllers
Route::resource('/students', StudentController::class);
Route::resource('/teachers', TeacherController::class);

Route::get('/index', function () {
    return view('index');
})->name("index");

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
//Route::get('/verifyaccount', [App\Http\Controllers\HomeController::class, 'verifyaccount'])->name('verifyaccount');
//Route::post('/verifyotp', [App\Http\Controllers\HomeController::class, 'useractivation'])->name('verifyotp');

Route::middleware(['web'])->group(function () {
    Route::get('/verifyaccount', [HomeController::class, 'verifyaccount'])->name('verifyaccount');
    Route::post('/verifyotp', [HomeController::class, 'useractivation'])->name('verifyotp');
});


//Route::get('/index', [ResetPasswordController::class, 'index']);

//Forgot password $ Reset
Route::get('forgot-password', [ForgotPasswordController::class, 'showForgotForm'])->name('password.request');
Route::post('forgot-password', [ForgotPasswordController::class, 'sendResetLink'])->name('password.email');
Route::get('reset-password/{token}', [ForgotPasswordController::class, 'showResetForm'])->name('password.reset');
Route::post('reset-password', [ForgotPasswordController::class, 'reset'])->name('password.update');

// route for the separate dashboards
Route::get('/admin', [DashboardController::class, 'admin'])->middleware('role:admin')->name('dashboard.admin');
Route::get('/teacher', [DashboardController::class, 'teacher'])->middleware('role:teacher')->name('dashboard.teacher');
Route::get('/parent', [DashboardController::class, 'parent'])->middleware('role:parent')->name('dashboard.parent');
Route::get('/student', [DashboardController::class, 'student'])->middleware('role:student')->name('dashboard.student');


// Attendance
Route::get('/attendance', [AttendanceController::class, 'index'])->middleware('auth')->name('attendance.index');
Route::post('/attendance', [AttendanceController::class, 'store'])->middleware('auth')->name('attendance.store');
Route::get('/attendance/show', [AttendanceController::class, 'show'])->middleware('auth')->name('attendance.show');
//Route::get('/attendance', [AttendanceController::class, 'showAttendance'])->name('attendance.index');

// fees
Route::get('/fees', [FeeController::class, 'index'])->name('fees.index');
Route::post('/fees/store', [FeeController::class, 'store'])->name('fees.store');
Route::post('/fees/update/{fee}', [FeeController::class, 'update'])->name('fees.update');
Route::get('/fees/create', [FeeController::class, 'create'])->name('fees/create');
Route::get('/admin/fee-summary', [FeeController::class, 'feeSummary'])->name('admin.feeSummary');

// class and subject
Route::get('/classes', [ClassController::class, 'index'])->name('classes.index');
Route::post('/classes/store', [ClassController::class, 'store'])->name('classes.store');
Route::post('/classes/{class}/assign-subjects', [ClassController::class, 'assignSubjects'])->name('classes.assignSubjects');
Route::get('/classes/create', [ClassController::class, 'create'])->name('classes/create');

Route::get('/subjects', [SubjectController::class, 'index'])->name('subjects.index');
Route::post('/subjects/store', [SubjectController::class, 'store'])->name('subjects.store');
Route::get('/subjects/create', [SubjectController::class, 'create'])->name('subjects/create');

