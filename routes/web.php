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
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\AdminLeaveController;
use App\Http\Controllers\CreditController;
use App\Http\Controllers\InquiryController;
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

// Data Sheet

Route::get('employees/sheet', [ContactsController::class, 'sheet'])
    ->name('employees.sheet');

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

// Notification

Route::put('notification', [NotificationController::class, 'update'])
    ->name('notification.update')
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

// Leave

Route::get('leaves', [AdminLeaveController::class, 'index'])
    ->name('leaves')
    ->middleware('auth');

Route::put('leaves/approve/{id}', [AdminLeaveController::class, 'approve'])
    ->name('leaves.approve')
    ->middleware('auth');

Route::put('leaves/disapprove/{id}', [AdminLeaveController::class, 'disapprove'])
    ->name('leaves.disapprove')
    ->middleware('auth');

// Form Leave

Route::get('leaves/form/{leave}', [AdminLeaveController::class, 'form'])
    ->name('leaves.form')
    ->middleware('auth');


// Credits

Route::get('employee/leave/credits/{contact}', [CreditController::class, 'index'])
    ->name('credits')
    ->middleware('auth');

Route::put('employee/sick/credits/{credit}', [CreditController::class, 'update_sick'])
    ->name('credits.sick.update')
    ->middleware('auth');

Route::put('employee/vacation/credits/{credit}', [CreditController::class, 'update_vacation'])
    ->name('credits.vacation.update')
    ->middleware('auth');

Route::post('employee/leave/credits/{contact}', [CreditController::class, 'store'])
    ->name('credits.store')
    ->middleware('auth');

Route::delete('employee/leave/credits/{id}', [CreditController::class, 'destroy'])
    ->name('credits.destroy')
    ->middleware('auth');

// Employees

Route::get('personal/dashboard', [EmployeeController::class, 'index'])
    ->name('employee.dashboard')
    ->middleware('web', 'employee');

Route::get('personal/profile/{contact}', [EmployeeController::class, 'profile'])
    ->name('employee.profile')
    ->middleware('web', 'employee');

Route::get('personal/leave', [LeaveController::class, 'index'])
    ->name('employee.leave')
    ->middleware('web', 'employee');

Route::get('personal/inquiry', [InquiryController::class, 'index'])
    ->name('employee.inquiry')
    ->middleware('web', 'employee');

Route::put('personal/inquiry/{contact}', [InquiryController::class, 'store'])
    ->name('employee.inquiry.store')
    ->middleware('web', 'employee');

Route::delete('personal/inquiry/{id}/delete', [InquiryController::class, 'destroy'])
    ->name('employee.inquiry.destroy')
    ->middleware('web', 'employee');

Route::put('personal/inquiry/{id}/restore', [InquiryController::class, 'restore'])
    ->name('employee.inquiry.restore')
    ->middleware('web', 'employee');

Route::get('personal/leave/credits/{contact}', [EmployeeController::class, 'credit'])
    ->name('employee.credit')
    ->middleware('web', 'employee');

Route::post('employee/leave/store', [LeaveController::class, 'store'])
    ->name('employee.leave.store')
    ->middleware('web', 'employee');

Route::delete('employee/leave/{leave}', [LeaveController::class, 'destroy'])
    ->name('employee.leave.destroy')
    ->middleware('web', 'employee');

Route::get('employee/logout', [EmployeeController::class, 'employee_logout'])
    ->name('employee.logout')
    ->middleware('web', 'employee');

Route::put('employee/password/update/{id}', [EmployeeController::class, 'password'])
    ->name('employee.password.update')
    ->middleware('web', 'employee');