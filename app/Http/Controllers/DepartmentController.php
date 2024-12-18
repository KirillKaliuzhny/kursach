<?php

namespace App\Http\Controllers;

use App\Models\Department;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DepartmentController extends Controller
{
    public function getAll()
    {
        return response()->json(Department::getAll('department', ['id','name']));
    }
    public function getColumns()
    {
        return Department::getTableColumns('department');
    }
}
