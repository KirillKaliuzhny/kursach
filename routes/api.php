<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FacultetController;
use App\Http\Controllers\DepartmentController;
use App\Http\Controllers\DisciplineController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\WorkloadController;

Route::get('/facultet', [FacultetController::class, 'getAll']);
Route::get('/department', [DepartmentController::class, 'getAll']);
Route::get('/discipline', [DisciplineController::class, 'getAll']);
Route::get('/teacher', [TeacherController::class, 'getAll']);
Route::get('/workload', [WorkloadController::class, 'getAll']);
