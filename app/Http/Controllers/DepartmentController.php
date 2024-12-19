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
    public function addData(Request $request)
    {
        $data = $request->all();
        $model = new Department();
        return $model->addData([], '', $data);
    }
    public function editData($id, Request $request)
    {
        $data = $request->all();
        $model = new Department();
        return $model->editData('', $data, $id);
    }
    public function getOne($id)
    {
        $model = new Department();
        return $model->getDataById('department', $id);
    }
    public function getDataByUpdate($id)
    {
        return Department::getDataByUpdate('department', $id);
    }
    public function deleteData($id)
    {
        return Department::deleteData('department', $id);
    }
}
