<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\AppointmentsController;
use App\Http\Controllers\ControlController;
use App\Http\Controllers\DoctorsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\ReservationController;
use App\Http\Controllers\SearchController;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');

Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');

Route::get('/appointment/doctor', [ReservationController::class, 'showDoctors'])->name('appointment.doctors');

Route::get('/appointment/doctor/info/{id}', [ReservationController::class, 'showDoctorInfo'])->name('appointment.doctor');

Route::get('appointment/date/{id}', [ReservationController::class, 'takeDate'])->name('appointment.date');

Route::post('appointment/date/make', [ReservationController::class, 'makeAppointment'])->name('appointment.make.post');

Route::post('/control/add/admin', [AdminController::class, 'newAdmin'])->name('admin.post');

Route::post('/login', [LoginController::class, 'authenticate'])->name('login.post');

Route::post('/control/add/doctor', [DoctorsController::class, 'newDoctor'])->name('doctor.post');

Route::post('/control/edit/doctor', [DoctorsController::class, 'updateDoctor'])->name('doctor.edit.post');

Route::post('/control/delete/doctor', [DoctorsController::class, 'deleteDoctor'])->name('doctor.delete.post');

Route::post('/control/add/appointments', [AppointmentsController::class, 'addAppointment'])->name('appointment.add.post');

Route::post('/control/edit/appointment', [AppointmentsController::class, 'editAppointment'])->name('appointment.edit.post');

Route::post('/control/delete/appointment', [AppointmentsController::class, 'deleteAppointment'])->name('appointment.delete.post');

Route::post('control/admin/delete', [AdminController::class, 'deleteAdmin'])->name('admin.delete.post');

Route::middleware('auth')->group(function () {

    Route::get('/control/add/admin', [AdminController::class, 'showAdminForm'])->name('admin.add');

    Route::get('/control', [ControlController::class, 'index'])->name('control');

    Route::get('/control/add/doctor', [DoctorsController::class, 'addDoctor'])->name('doctor.add');

    Route::get('/control/edit/doctor/{id}', [DoctorsController::class, 'editDoctorPage'])->name('doctor.edit');

    Route::get('/control/appointments', [AppointmentsController::class, 'showAppointmentsPage'])->name('appointments');

    Route::get('/control/add/appointments', [AppointmentsController::class, 'addAppointmentPage'])->name('appointments.add');

    Route::get('/control/edit/appointment/{id}', [AppointmentsController::class, 'editAppointmentPage'])->name('appointment.edit');

    Route::get('/control/admins', [AdminController::class, 'showAdminsPage'])->name('admins');

    Route::get('/control/search/doctor', [SearchController::class, 'doctorSearch'])->name('doctor.search');

    Route::get('/control/search/appointments', [SearchController::class, 'appointmentSearch'])->name('appointment.search');

    Route::get('/control/search/admin', [SearchController::class, 'adminSearch'])->name('admin.search');
});
