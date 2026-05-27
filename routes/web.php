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
use App\Http\Controllers\AuthController;
use App\Http\Controllers\EmployerController;
use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\JobPostingController;
use App\Http\Controllers\EmployerProfileController;

// form
Route::get('/login', function () {
    return view('auth.login');
});

Route::get('/register', function () {
    return view('auth.register');
});


// LOGIN
Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/login', [AuthController::class, 'login']);

// REGISTER
Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
Route::post('/register', [AuthController::class, 'register']);

// LOGOUT
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// test role
/*Route::get('/admin', function () {
    return "Trang ADMIN";
});*/

Route::get('/employer', function () {
    return "Trang EMPLOYER";
});

Route::get('/candidate', function () {
    return "Trang CANDIDATE";
});
Route::get('/', function () {
    return view('welcome');
});

////----------------------EMPLOYER----------------------------------

Route::get('/employer/dashboard', [EmployerController::class, 'dashboard']);

Route::get('/employer/jobs', [JobPostingController::class, 'index']);
Route::get('/employer/jobs/create', [JobPostingController::class, 'create']);
Route::post('/employer/jobs/store', [JobPostingController::class, 'store']);
Route::get('/employer/jobs/edit/{id}', [JobPostingController::class, 'edit']);
Route::post('/employer/jobs/update/{id}', [JobPostingController::class, 'update']);
Route::delete('/employer/jobs/delete/{id}', [JobPostingController::class, 'destroy']);

Route::get('/employer/applications', [ApplicationController::class, 'index']);
Route::get('/employer/applications/{id}', [ApplicationController::class, 'show']);
Route::post('/employer/applications/{id}/status', [ApplicationController::class, 'updateStatus']);


Route::get('/employer/jobs', [JobPostingController::class, 'index']);
Route::get('/employer/jobs/edit/{id}', [JobPostingController::class, 'edit']);
Route::post('/employer/jobs/update/{id}', [JobPostingController::class, 'update']);


Route::get('/employer/profile', [EmployerProfileController::class, 'index']);
Route::get('/employer/profile/edit', [EmployerProfileController::class, 'edit']);
Route::post('/employer/profile/update', [EmployerProfileController::class, 'update']);


////----------------------ADMIN----------------------------------
use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\AdminUserController;
use App\Http\Controllers\Admin\AdminJobTypeController;
use App\Http\Controllers\Admin\AdminSalaryController;
use App\Http\Controllers\Admin\AdminSkillController;
use App\Http\Controllers\Admin\AdminLocationController;
use App\Http\Controllers\Admin\AdminCareerGuideController;
use App\Http\Controllers\Admin\AdminJobPostingController;

Route::prefix('admin')->group(function () {

    Route::get('/dashboard', [AdminController::class, 'dashboard']);

    // USERS
    Route::get('/users', [AdminUserController::class, 'index']);
    Route::get('/users/delete/{id}', [AdminUserController::class, 'destroy']);

    // JOB TYPES
    Route::get('/job-types', [AdminJobTypeController::class, 'index']);
    Route::post('/job-types/store', [AdminJobTypeController::class, 'store']);
    Route::post('/job-types/update/{id}', [AdminJobTypeController::class, 'update']);
    Route::get('/job-types/delete/{id}', [AdminJobTypeController::class, 'destroy']);

    // SALARIES
    Route::get('/salaries', [AdminSalaryController::class, 'index']);
    Route::post('/salaries/store', [AdminSalaryController::class, 'store']);
    Route::post('/salaries/update/{id}', [AdminSalaryController::class, 'update']);
    Route::get('/salaries/delete/{id}', [AdminSalaryController::class, 'destroy']);

    // SKILLS
    Route::get('/skills', [AdminSkillController::class, 'index']);
    Route::post('/skills/store', [AdminSkillController::class, 'store']);
    Route::post('/skills/update/{id}', [AdminSkillController::class, 'update']);
    Route::get('/skills/delete/{id}', [AdminSkillController::class, 'destroy']);

    // LOCATIONS
    Route::get('/locations', [AdminLocationController::class, 'index']);
    Route::post('/locations/store', [AdminLocationController::class, 'store']);
    Route::post('/locations/update/{id}', [AdminLocationController::class, 'update']);
    Route::get('/locations/delete/{id}', [AdminLocationController::class, 'destroy']);

    // CAREER GUIDES
    Route::get('/careers', [AdminCareerGuideController::class, 'index']);
    Route::get('/careers/create', [AdminCareerGuideController::class, 'create']);
    Route::post('/careers/store', [AdminCareerGuideController::class, 'store']);
    Route::get('/careers/edit/{id}', [AdminCareerGuideController::class, 'edit']);
    Route::post('/careers/update/{id}', [AdminCareerGuideController::class, 'update']);
    Route::get('/careers/delete/{id}', [AdminCareerGuideController::class, 'destroy']);

    Route::get('/jobs', [AdminJobPostingController::class, 'index']);
    Route::post('/jobs/update-status/{id}',
        [AdminJobPostingController::class, 'updateStatus']);
    Route::get('/jobs/delete/{id}',
        [AdminJobPostingController::class, 'destroy']);
});