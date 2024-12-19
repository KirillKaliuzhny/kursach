<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FacultetController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DisciplineController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\WorkloadController;

Route::get('/facultet', [FacultetController::class, 'getAll']);
Route::post('/facultet', [FacultetController::class, 'addData']);
Route::get('/facultet/columns', [FacultetController::class, 'getColumns']);

Route::get('/department', [DepartmentController::class, 'getAll']);
Route::post('/department', [DepartmentController::class, 'addData']);
Route::get('/department/columns', [DepartmentController::class, 'getColumns']);

Route::get('/discipline', [DisciplineController::class, 'getAll']);
Route::post('/discipline', [DisciplineController::class, 'addData']);
Route::get('/discipline/columns', [DisciplineController::class, 'getColumns']);

Route::get('/teacher', [TeacherController::class, 'getAll']);
Route::post('/teacher', [TeacherController::class, 'addData']);
Route::get('/teacher/columns', [TeacherController::class, 'getColumns']);

Route::get('/workload', [WorkloadController::class, 'getAll']);
Route::post('/workload', [WorkloadController::class, 'addData']);
Route::get('/workload/columns', [WorkloadController::class, 'getColumns']);
