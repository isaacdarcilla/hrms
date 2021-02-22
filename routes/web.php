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

// Organizations

Route::get('organizations', [OrganizationsController::class, 'index'])
    ->name('organizations')
    ->middleware('remember', 'auth');

Route::get('organizations/create', [OrganizationsController::class, 'create'])
    ->name('organizations.create')
    ->middleware('auth');

Route::post('organizations', [OrganizationsController::class, 'store'])
    ->name('organizations.store')
    ->middleware('auth');

Route::get('organizations/{organization}/edit', [OrganizationsController::class, 'edit'])
    ->name('organizations.edit')
    ->middleware('auth');

Route::put('organizations/{organization}', [OrganizationsController::class, 'update'])
    ->name('organizations.update')
    ->middleware('auth');

Route::delete('organizations/{organization}', [OrganizationsController::class, 'destroy'])
    ->name('organizations.destroy')
    ->middleware('auth');

Route::put('organizations/{organization}/restore', [OrganizationsController::class, 'restore'])
    ->name('organizations.restore')
    ->middleware('auth');

// Employees

Route::get('employees', [ContactsController::class, 'index'])
    ->name('employees')
    ->middleware('remember', 'auth');

Route::get('employees/create', [ContactsController::class, 'create'])
    ->name('employees.create')
    ->middleware('auth');

Route::post('employees', [ContactsController::class, 'store'])
    ->name('employees.store')
    ->middleware('auth');

Route::get('employees/{contact}/edit', [ContactsController::class, 'edit'])
    ->name('employees.edit')
    ->middleware('auth');

Route::post('employees/{contact}', [ContactsController::class, 'update'])
    ->name('employees.update')
    ->middleware('auth');

Route::put('employees/{contact}/photo', [ContactsController::class, 'update_photo'])
    ->name('employees.update.photo')
    ->middleware('auth');

Route::put('employees/{contact}/status', [ContactsController::class, 'update_status'])
    ->name('employees.update.status')
    ->middleware('auth');

Route::delete('employees/{contact}', [ContactsController::class, 'destroy'])
    ->name('employees.destroy')
    ->middleware('auth');

Route::put('employees/{contact}/restore', [ContactsController::class, 'restore'])
    ->name('employees.restore')
    ->middleware('auth');

// Family Background

Route::post('family', [FamilyController::class, 'store'])
    ->name('family.store')
    ->middleware('auth');

Route::put('family/{employee}', [FamilyController::class, 'update'])
    ->name('family.update')
    ->middleware('auth');

// Childrens

Route::put('children/{children}', [ChildrenController::class, 'update'])
    ->name('children.update')
    ->middleware('auth');

Route::post('children/{contact}/{background}', [ChildrenController::class, 'store'])
    ->name('children.store')
    ->middleware('auth');

Route::delete('children/{children}', [ChildrenController::class, 'destroy'])
    ->name('children.destroy')
    ->middleware('auth');

// Educations

Route::post('education', [EducationController::class, 'store'])
    ->name('education.store')
    ->middleware('auth');

Route::put('education/{education}', [EducationController::class, 'update'])
    ->name('education.update')
    ->middleware('auth');

Route::delete('education/{education}', [EducationController::class, 'destroy'])
    ->name('education.destroy')
    ->middleware('auth');

// Elgibility

Route::post('eligibility', [EligibilityController::class, 'store'])
    ->name('eligibility.store')
    ->middleware('auth');

Route::put('eligibility/{eligibility}', [EligibilityController::class, 'update'])
    ->name('eligibility.update')
    ->middleware('auth');

Route::delete('eligibility/{eligibility}', [EligibilityController::class, 'destroy'])
    ->name('eligibility.destroy')
    ->middleware('auth');

// Experience

Route::post('experience', [ExperienceController::class, 'store'])
    ->name('experience.store')
    ->middleware('auth');

Route::put('experience/{experience}', [ExperienceController::class, 'update'])
    ->name('experience.update')
    ->middleware('auth');

Route::delete('experience/{experience}', [ExperienceController::class, 'destroy'])
    ->name('experience.destroy')
    ->middleware('auth');

// Volunteer

Route::post('volunteer', [VolunteerController::class, 'store'])
    ->name('volunteer.store')
    ->middleware('auth');

Route::put('volunteer/{volunteer}', [VolunteerController::class, 'update'])
    ->name('volunteer.update')
    ->middleware('auth');

Route::delete('volunteer/{volunteer}', [VolunteerController::class, 'destroy'])
    ->name('volunteer.destroy')
    ->middleware('auth');

// Training

Route::post('training', [TrainingController::class, 'store'])
    ->name('training.store')
    ->middleware('auth');

Route::put('training/{training}', [TrainingController::class, 'update'])
    ->name('training.update')
    ->middleware('auth');

Route::delete('training/{training}', [TrainingController::class, 'destroy'])
    ->name('training.destroy')
    ->middleware('auth');

// Skill

Route::post('skill', [OtherInformationController::class, 'store'])
    ->name('skill.store')
    ->middleware('auth');

Route::put('skill/{skill}', [OtherInformationController::class, 'update'])
    ->name('skill.update')
    ->middleware('auth');

Route::delete('skill/{skill}', [OtherInformationController::class, 'destroy_skill'])
    ->name('skill.destroy')
    ->middleware('auth');

// Recognition

Route::post('recognition', [OtherInformationController::class, 'store_recognition'])
    ->name('recognition.store')
    ->middleware('auth');

Route::put('recognition/{recognition}', [OtherInformationController::class, 'update_recognition'])
    ->name('recognition.update')
    ->middleware('auth');

Route::delete('recognition/{recognition}', [OtherInformationController::class, 'destroy_recognition'])
    ->name('recognition.destroy')
    ->middleware('auth');

// Membership

Route::post('membership', [OtherInformationController::class, 'store_membership'])
    ->name('membership.store')
    ->middleware('auth');

Route::put('membership/{membership}', [OtherInformationController::class, 'update_membership'])
    ->name('membership.update')
    ->middleware('auth');

Route::delete('membership/{membership}', [OtherInformationController::class, 'destroy_membership'])
    ->name('membership.destroy')
    ->middleware('auth');

// Document

Route::put('document', [DocumentController::class, 'store'])
    ->name('document.store')
    ->middleware('auth');

Route::delete('document/{document}', [DocumentController::class, 'destroy'])
    ->name('document.destroy')
    ->middleware('auth');

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

Route::get('employee/logout', [EmployeeController::class, 'employee_logout'])
    ->name('employee.logout')
    ->middleware('web', 'employee');
