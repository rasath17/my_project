<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\EmployeeController;
use App\Http\Controllers\Auth\HrController;
use App\Http\Controllers\Auth\TraineeController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\HrWorkController;
use App\Http\Controllers\TraineeWorkController;
use App\Http\Controllers\EmployeeWorkController;

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
    return view('welcome');
});

Route::prefix('employee')->group(function () {

    Route::get('register', [EmployeeController::class, 'register'])->name('employee.register');
    Route::post('create', [EmployeeController::class, 'create'])->name('employee.create');
    Route::get('login', [EmployeeController::class, 'login'])->name('employee.login')->middleware('guest:employee');
    Route::post('check', [EmployeeController::class, 'check'])->name('employee.check');
    Route::get('dashboard', [EmployeeController::class, 'dashboard'])->name('employee.dashboard')->middleware('auth:employee');
    Route::get('logout', [EmployeeController::class, 'logout'])->name('employee.logout')->middleware('auth:employee');

    /*----------------------------------Task--------------------------------------------------*/

    Route::get('daily/task/{id}', [EmployeeWorkController::class, 'daily'])->name('employee.daily.task')->middleware('auth:employee');
    Route::put('daily/status/accept/{id}', [EmployeeWorkController::class, 'accept'])->name('employee.daily.task.accept')->middleware('auth:employee');
    Route::delete('daily/status/reject/{id}', [EmployeeWorkController::class, 'destroy'])->name('employee.daily.task.delete');
    Route::get('trainee/status/{id}', [EmployeeWorkController::class, 'status'])->name('employee.trainee.status')->middleware('auth:employee');

    /*----------------------------------Task--------------------------------------------------*/

});


Route::prefix('trainee')->group(function () {

    Route::get('register', [TraineeController::class, 'register'])->name('trainee.register');
    Route::post('create', [TraineeController::class, 'create'])->name('trainee.create');
    Route::get('login', [TraineeController::class, 'login'])->name('trainee.login')->middleware('guest:trainee');
    Route::post('check', [TraineeController::class, 'check'])->name('trainee.check');
    Route::get('dashboard', [TraineeController::class, 'dashboard'])->name('trainee.dashboard')->middleware('auth:trainee');
    Route::get('logout', [TraineeController::class, 'logout'])->name('trainee.logout')->middleware('auth:trainee');

    /*----------------------------------Task--------------------------------------------------*/

    Route::get('task/{id}', [TraineeWorkController::class, 'task'])->name('trainee.task')->middleware('auth:trainee');
    Route::put('task/completed/{id}', [TraineeWorkController::class,'complete'])->name('trainee.complete')->middleware('auth:trainee');
    /*----------------------------------Task--------------------------------------------------*/

});

Route::prefix('hr')->group(function () {

    Route::get('register', [HrController::class, 'register'])->name('hr.register');
    Route::post('create', [HrController::class, 'create'])->name('hr.create');
    Route::get('login', [HrController::class, 'login'])->name('hr.login')->middleware('guest:hr');
    Route::post('check', [HrController::class, 'check'])->name('hr.check');
    Route::get('dashboard', [HrController::class, 'dashboard'])->name('hr.dashboard')->middleware('auth:hr');
    Route::get('logout', [HrController::class, 'logout'])->name('hr.logout');

    /*----------------------------------Task--------------------------------------------------*/


    Route::get('task/create', [TaskController::class, 'create'])->name('task.create')->middleware('auth:hr');
    Route::post('task/store/{id}', [TaskController::class, 'store'])->name('task.store')->middleware('auth:hr');
    Route::get('task/status', [TaskController::class, 'index'])->name('task.status')->middleware('auth:hr');
    Route::get('task/edit/{id}', [TaskController::class, 'edit'])->name('task.edit')->middleware('auth:hr');
    Route::delete('task/delete{id}', [TaskController::class, 'destroy'])->name('task.destroy')->middleware('auth:hr');
    Route::put('task/update/{id}', [TaskController::class, 'update'])->name('task.update');


    /*----------------------------------Task--------------------------------------------------*/

    Route::get('employee/details', [HrWorkController::class, 'employee'])->name('hr.employee')->middleware('auth:hr');
    Route::get('trainee/details', [HrWorkController::class, 'trainee'])->name('hr.trainee')->middleware('auth:hr');

});


Route::view('az1', 'hr.dashboard');
Route::view('az2', 'employee.dashboard');




