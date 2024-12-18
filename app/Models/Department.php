<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Department extends AbstractModel
{
    protected $table = 'department';
    protected $fillable = [
        'id',
        'name',
        'name_manager',
        'classroom',
        'frame',
        'phone',
        'teachers',
        'facultet_id'
    ];
    public static function getTableColumns($table) {
        $data = parent::getTableColumns($table);
        foreach ($data as &$columnData) {
            if ($columnData->DROPDOWN == 1) {
                $foreignTable = explode('_',$columnData->COLUMN_NAME)[0];
                $select = ['id','name'];
                $select = implode(',', $select);
                $sql = DB::select("
                    select ". $select ." from ".$foreignTable."
                ");
                $columnData->VALUES = $sql;
            }
        }
        return $data;
    }
}
