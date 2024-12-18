<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Teacher extends AbstractModel
{
    protected $table = 'teacher';
    protected $fillable = [
        'id',
        'lastname',
        'name',
        'surname',
        'department_id',
        'birth',
        'employment',
        'experience',
        'position',
        'gender',
        'city',
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
