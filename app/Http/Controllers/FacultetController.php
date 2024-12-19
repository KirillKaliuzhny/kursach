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
}
