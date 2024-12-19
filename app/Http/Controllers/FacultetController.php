<?php

namespace App\Http\Controllers;

use App\Models\Facultet;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class FacultetController extends Controller
{
    public function getAll()
    {
        return response()->json(Facultet::getAll('facultet', ['id','name']));
    }
    public function getColumns()
    {
        return Facultet::getTableColumns('facultet');
    }
    public function addData(Request $request)
    {
        $data = $request->all();
        $model = new Facultet();
        return $model->addData([], '', $data);
    }
    public function editData($id, Request $request)
    {
        $data = $request->all();
        $model = new Facultet();
        return $model->editData('', $data, $id);
    }
    public function getOne($id)
    {
        $model = new Facultet();
        return $model->getDataById('facultet', $id);
    }
    public function getDataByUpdate($id)
    {
        return Facultet::getDataByUpdate('facultet', $id);
    }
}
