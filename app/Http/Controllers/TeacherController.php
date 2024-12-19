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
    public function getColumns()
    {
        return Teacher::getTableColumns('teacher');
    }
    public function addData(Request $request)
    {
        $data = $request->all();
        $model = new Teacher();
        return $model->addData([], '', $data);
    }
    public function editData($id, Request $request)
    {
        $data = $request->all();
        $model = new Teacher();
        return $model->editData('', $data, $id);
    }
    public function getOne($id)
    {
        $model = new Teacher();
        return $model->getDataById('teacher', $id);
    }
    public function getDataByUpdate($id)
    {
        return Teacher::getDataByUpdate('teacher', $id);
    }
}
