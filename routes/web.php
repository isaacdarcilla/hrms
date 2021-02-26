<?php

use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\ContactsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ImagesController;
use App\Http\Controllers\OrganizationsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\Employee\ChildrenController;
use App\Http\Controllers\Employee\EducationController;
use App\Http\Controllers\Employee\EligibilityController;
use App\Http\Controllers\Employee\ExperienceController;
use App\Http\Controllers\Employee\VolunteerController;
use App\Http\Controllers\Employee\FamilyController;
use App\Http\Controllers\Employee\TrainingController;
use App\Http\Controllers\Employee\OtherInformationController;
use App\Http\Controllers\Employee\DocumentController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\JobController;
use App\Http\Controllers\ApplicantController;
use App\Http\Controllers\NoticeController;
use App\Http\Controllers\TaskController;
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

// Auth

Route::get('login', [LoginController::class, 'showLoginForm'])
    ->name('login')
    ->middleware('guest');

Route::get('login/employee', [LoginController::class, 'showLoginFormEmployee'])
    ->name('login.employee')
    ->middleware('guest');

Route::post('login', [LoginController::class, 'login'])
    ->name('login.attempt')
    ->middleware('guest');

Route::post('login/employee', [LoginController::class, 'loginEmployee'])
    ->name('login.attempt.employee')
    ->middleware('guest');

Route::post('logout', [LoginController::class, 'logout'])
    ->name('logout');

// Dashboard

Route::get('/', [DashboardController::class, 'index'])
    ->name('dashboard')
    ->middleware('auth');

// Users

Route::get('users', [UsersController::class, 'index'])
    ->name('users')
    ->middleware('remember', 'auth');

Route::get('users/create', [UsersController::class, 'create'])
    ->name('users.create')
    ->middleware('auth');

Route::post('users', [UsersController::class, 'store'])
    ->name('users.store')
    ->middleware('auth');

Route::get('users/{user}/edit', [UsersController::class, 'edit'])
    ->name('users.edit')
    ->middleware('auth');

Route::put('users/{user}', [UsersController::class, 'update'])
    ->name('users.update')
    ->middleware('auth');

Route::delete('users/{user}', [UsersController::class, 'destroy'])
    ->name('users.destroy')
    ->middleware('auth');

Route::put('users/{user}/restore', [UsersController::class, 'restore'])
    ->name('users.restore')
    ->middleware('auth');

// Employees

Route::get('employees', [ContactsController::class, 'index'])
    ->name('employees')
    ->middleware('remember', 'auth');

Route::post('employees', [ContactsController::class, 'store'])
    ->name('employees.store')
    ->middleware('auth');

Route::get('employees/{contact}/edit', [ContactsController::class, 'edit'])
    ->name('employees.edit');

Route::post('employees/{contact}', [ContactsController::class, 'update'])
    ->name('employees.update');

Route::put('employees/{contact}/photo', [ContactsController::class, 'update_photo'])
    ->name('employees.update.photo');

Route::put('employees/{contact}/status', [ContactsController::class, 'update_status'])
    ->name('employees.update.status');

Route::delete('employees/{contact}', [ContactsController::class, 'destroy'])
    ->name('employees.destroy')
    ->middleware('auth');

Route::put('employees/{contact}/restore', [ContactsController::class, 'restore'])
    ->name('employees.restore')
    ->middleware('auth');

// Family Background

Route::post('family', [FamilyController::class, 'store'])
    ->name('family.store');

Route::put('family/{employee}', [FamilyController::class, 'update'])
    ->name('family.update');

// Childrens

Route::put('children/{children}', [ChildrenController::class, 'update'])
    ->name('children.update');

Route::post('children/{contact}/{background}', [ChildrenController::class, 'store'])
    ->name('children.store');

Route::delete('children/{children}', [ChildrenController::class, 'destroy'])
    ->name('children.destroy');

// Educations

Route::post('education', [EducationController::class, 'store'])
    ->name('education.store');

Route::put('education/{education}', [EducationController::class, 'update'])
    ->name('education.update');

Route::delete('education/{education}', [EducationController::class, 'destroy'])
    ->name('education.destroy');

// Elgibility

Route::post('eligibility', [EligibilityController::class, 'store'])
    ->name('eligibility.store');

Route::put('eligibility/{eligibility}', [EligibilityController::class, 'update'])
    ->name('eligibility.update');

Route::delete('eligibility/{eligibility}', [EligibilityController::class, 'destroy'])
    ->name('eligibility.destroy');

// Experience

Route::post('experience', [ExperienceController::class, 'store'])
    ->name('experience.store');

Route::put('experience/{experience}', [ExperienceController::class, 'update'])
    ->name('experience.update');

Route::delete('experience/{experience}', [ExperienceController::class, 'destroy'])
    ->name('experience.destroy');

// Volunteer

Route::post('volunteer', [VolunteerController::class, 'store'])
    ->name('volunteer.store');

Route::put('volunteer/{volunteer}', [VolunteerController::class, 'update'])
    ->name('volunteer.update');

Route::delete('volunteer/{volunteer}', [VolunteerController::class, 'destroy'])
    ->name('volunteer.destroy');

// Training

Route::post('training', [TrainingController::class, 'store'])
    ->name('training.store');

Route::put('training/{training}', [TrainingController::class, 'update'])
    ->name('training.update');

Route::delete('training/{training}', [TrainingController::class, 'destroy'])
    ->name('training.destroy');

// Skill

Route::post('skill', [OtherInformationController::class, 'store'])
    ->name('skill.store');

Route::put('skill/{skill}', [OtherInformationController::class, 'update'])
    ->name('skill.update');

Route::delete('skill/{skill}', [OtherInformationController::class, 'destroy_skill'])
    ->name('skill.destroy');

// Recognition

Route::post('recognition', [OtherInformationController::class, 'store_recognition'])
    ->name('recognition.store');

Route::put('recognition/{recognition}', [OtherInformationController::class, 'update_recognition'])
    ->name('recognition.update');

Route::delete('recognition/{recognition}', [OtherInformationController::class, 'destroy_recognition'])
    ->name('recognition.destroy');

// Membership

Route::post('membership', [OtherInformationController::class, 'store_membership'])
    ->name('membership.store');

Route::put('membership/{membership}', [OtherInformationController::class, 'update_membership'])
    ->name('membership.update');

Route::delete('membership/{membership}', [OtherInformationController::class, 'destroy_membership'])
    ->name('membership.destroy');

// Document

Route::put('document', [DocumentController::class, 'store'])
    ->name('document.store');

Route::delete('document/{document}', [DocumentController::class, 'destroy'])
    ->name('document.destroy');

// Reports

Route::get('reports', [ReportsController::class, 'index'])
    ->name('reports')
    ->middleware('auth');

// Images

Route::get('/img/{path}', [ImagesController::class, 'show'])->where('path', '.*');

// Jobs

Route::get('jobs', [JobController::class, 'index'])
    ->name('jobs')
    ->middleware('auth');

Route::get('lists/jobs', [JobController::class, 'list'])
    ->name('jobs.list');

Route::get('job/offer/{link}', [JobController::class, 'job'])
    ->name('jobs.job');

Route::post('jobs', [JobController::class, 'store'])
    ->name('jobs.store')
    ->middleware('auth');

Route::delete('jobs/{jobs}', [JobController::class, 'destroy'])
    ->name('jobs.destroy')
    ->middleware('auth');

Route::put('jobs/{jobs}', [JobController::class, 'update'])
    ->name('jobs.update')
    ->middleware('auth');

Route::put('jobs/{jobs}/restore', [JobController::class, 'restore'])
    ->name('jobs.restore')
    ->middleware('auth');

// Applicant

Route::get('applicants', [ApplicantController::class, 'index'])
    ->name('applicants')
    ->middleware('auth');

Route::put('applicants/{job}', [ApplicantController::class, 'store'])
    ->name('applicants.store');

Route::post('applicants/{applicant}/{job}', [ApplicantController::class, 'recruit'])
    ->name('applicants.recruit');

// Task

Route::post('task/{user}', [TaskController::class, 'store'])
    ->name('task.store')
    ->middleware('auth');

Route::put('task/{task}', [TaskController::class, 'update'])
    ->name('task.update')
    ->middleware('auth');

Route::put('task/{task}/undone', [TaskController::class, 'update_undone'])
    ->name('task.update.undone')
    ->middleware('auth');

Route::delete('task/{user}', [TaskController::class, 'destroy'])
    ->name('task.destroy')
    ->middleware('auth');

// Employee Task

Route::post('employee/task/{user}', [TaskController::class, 'store_employee'])
    ->name('task.store.employee');

Route::put('employee/task/{task}', [TaskController::class, 'update_employee'])
    ->name('task.update.employee');

Route::put('employee/task/{task}/undone', [TaskController::class, 'update_undone_employee'])
    ->name('task.update.undone.employee');

Route::delete('employee/task/{user}', [TaskController::class, 'destroy_employee'])
    ->name('task.destroy.employee');

// Notice Board

Route::get('notices', [NoticeController::class, 'index'])
    ->name('notices')
    ->middleware('auth');

Route::post('notices', [NoticeController::class, 'store'])
    ->name('notices.store')
    ->middleware('auth');

Route::put('notices/{notices}', [NoticeController::class, 'update'])
    ->name('notices.update')
    ->middleware('auth');

Route::delete('notices/{notices}', [NoticeController::class, 'destroy'])
    ->name('notices.destroy')
    ->middleware('auth');

Route::put('notices/{notices}/restore', [NoticeController::class, 'restore'])
    ->name('notices.restore')
    ->middleware('auth');

// Employees

Route::get('employee/dashboard', [EmployeeController::class, 'index'])
    ->name('employee.dashboard')
    ->middleware('web', 'employee');

Route::get('employee/profile/{contact}', [EmployeeController::class, 'profile'])
    ->name('employee.profile')
    ->middleware('web', 'employee');

Route::get('employee/logout', [EmployeeController::class, 'employee_logout'])
    ->name('employee.logout')
    ->middleware('web', 'employee');


