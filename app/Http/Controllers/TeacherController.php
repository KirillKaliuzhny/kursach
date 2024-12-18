<?php

namespace App\Http\Controllers;

use App\Models\Teacher;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TeacherController extends Controller
{
    public function getAll()
    {
        return response()->json(Teacher::getAll('teacher', ['id','name', 'lastname', 'surname']));
    }
}
