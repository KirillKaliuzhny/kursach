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
Route::post('/facultet/{id}/edit', [FacultetController::class, 'editData']);
Route::get('/facultet/{id}', [FacultetController::class, 'getOne']);
Route::get('/facultet/{id}/get', [FacultetController::class, 'getDataByUpdate']);
Route::delete('/facultet/{id}/delete', [FacultetController::class, 'deleteData']);

Route::get('/department', [DepartmentController::class, 'getAll']);
Route::post('/department', [DepartmentController::class, 'addData']);
Route::get('/department/columns', [DepartmentController::class, 'getColumns']);
Route::post('/department/{id}/edit', [DepartmentController::class, 'editData']);
Route::get('/department/{id}', [DepartmentController::class, 'getOne']);
Route::get('/department/{id}/get', [DepartmentController::class, 'getDataByUpdate']);
Route::delete('/department/{id}/delete', [DepartmentController::class, 'deleteData']);

Route::get('/discipline', [DisciplineController::class, 'getAll']);
Route::post('/discipline', [DisciplineController::class, 'addData']);
Route::get('/discipline/columns', [DisciplineController::class, 'getColumns']);
Route::post('/discipline/{id}/edit', [DisciplineController::class, 'editData']);
Route::get('/discipline/{id}', [DisciplineController::class, 'getOne']);
Route::get('/discipline/{id}/get', [DisciplineController::class, 'getDataByUpdate']);
Route::delete('/discipline/{id}/delete', [DisciplineController::class, 'deleteData']);

Route::get('/teacher', [TeacherController::class, 'getAll']);
Route::post('/teacher', [TeacherController::class, 'addData']);
Route::get('/teacher/columns', [TeacherController::class, 'getColumns']);
Route::post('/teacher/{id}/edit', [TeacherController::class, 'editData']);
Route::get('/teacher/{id}', [TeacherController::class, 'getOne']);
Route::get('/teacher/{id}/get', [TeacherController::class, 'getDataByUpdate']);
Route::delete('/teacher/{id}/delete', [TeacherController::class, 'deleteData']);

Route::get('/workload', [WorkloadController::class, 'getAll']);
Route::post('/workload', [WorkloadController::class, 'addData']);
Route::get('/workload/columns', [WorkloadController::class, 'getColumns']);
Route::post('/workload/{id}/edit', [WorkloadController::class, 'editData']);
Route::get('/workload/{id}', [WorkloadController::class, 'getOne']);
Route::get('/workload/{id}/get', [WorkloadController::class, 'getDataByUpdate']);
Route::delete('/workload/{id}/delete', [WorkloadController::class, 'deleteData']);
