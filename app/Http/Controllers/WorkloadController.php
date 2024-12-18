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
}
