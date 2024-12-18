<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\FacultetController;

Route::get('/facultet', [FacultetController::class, 'getAll']);
