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
use App\Http\Controllers\Employee\TrainingController;
use App\Http\Controllers\Employee\OtherInformationController;
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

Route::post('login', [LoginController::class, 'login'])
    ->name('login.attempt')
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

Route::put('employees/{contact}', [ContactsController::class, 'update'])
    ->name('employees.update')
    ->middleware('auth');

Route::put('employees/{contact}', [ContactsController::class, 'update_photo'])
    ->name('employees.update.photo')
    ->middleware('auth');

Route::delete('employees/{contact}', [ContactsController::class, 'destroy'])
    ->name('employees.destroy')
    ->middleware('auth');

Route::put('employees/{contact}/restore', [ContactsController::class, 'restore'])
    ->name('employees.restore')
    ->middleware('auth');

// Childrens

Route::put('children/{children}', [ChildrenController::class, 'update'])
    ->name('children.update')
    ->middleware('auth');

Route::post('children', [ChildrenController::class, 'store'])
    ->name('children.store')
    ->middleware('auth');

Route::delete('children/{children}', [ChildrenController::class, 'destroy'])
    ->name('children.destroy')
    ->middleware('auth');

// Educations

Route::delete('education/{education}', [EducationController::class, 'destroy'])
    ->name('education.destroy')
    ->middleware('auth');

// Elgibility

Route::delete('eligibility/{eligibility}', [EligibilityController::class, 'destroy'])
    ->name('eligibility.destroy')
    ->middleware('auth');

// Experience

Route::delete('experience/{experience}', [ExperienceController::class, 'destroy'])
    ->name('experience.destroy')
    ->middleware('auth');

// Volunteer

Route::delete('volunteer/{volunteer}', [VolunteerController::class, 'destroy'])
    ->name('volunteer.destroy')
    ->middleware('auth');

// Training

Route::delete('training/{training}', [TrainingController::class, 'destroy'])
    ->name('training.destroy')
    ->middleware('auth');

// Skill

Route::delete('skill/{skill}', [OtherInformationController::class, 'destroy_skill'])
    ->name('skill.destroy')
    ->middleware('auth');

// Recognition

Route::delete('recognition/{recognition}', [OtherInformationController::class, 'destroy_recognition'])
    ->name('recognition.destroy')
    ->middleware('auth');

// Membership

Route::delete('membership/{membership}', [OtherInformationController::class, 'destroy_membership'])
    ->name('membership.destroy')
    ->middleware('auth');

// Reports

Route::get('reports', [ReportsController::class, 'index'])
    ->name('reports')
    ->middleware('auth');

// Images

Route::get('/img/{path}', [ImagesController::class, 'show'])->where('path', '.*');
