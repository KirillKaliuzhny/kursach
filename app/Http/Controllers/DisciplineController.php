<?php

namespace App\Http\Controllers;

use App\Models\Discipline;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class DisciplineController extends Controller
{
    public function getAll()
    {
        return response()->json(Discipline::getAll('discipline', ['id', 'name']));
    }
    public function getColumns()
    {
        return Discipline::getTableColumns('discipline');
    }
    public function addData(Request $request)
    {
        $data = $request->all();
        $model = new Discipline();
        return $model->addData([], '', $data);
    }
}
