<?php

namespace App\Http\Controllers;

use App\Models\Workload;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class WorkloadController extends Controller
{
    public function getAll()
    {
        $data = Workload::getAll('workload', 'workload.id');
        return response()->json($data);
    }
    public function getColumns()
    {
        return Workload::getTableColumns('workload');
    }
    public function addData(Request $request)
    {
        $data = $request->all();
        $model = new Workload();
        return $model->addData([], '', $data);
    }
    public function editData($id, Request $request)
    {
        $data = $request->all();
        $model = new Workload();
        return $model->editData('', $data, $id);
    }
    public function getOne($id)
    {
        $model = new Workload();
        return $model->getDataById('workload', $id);
    }
    public function getDataByUpdate($id)
    {
        return Workload::getDataByUpdate('workload', $id);
    }
}
