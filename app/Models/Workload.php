<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

class Workload extends AbstractModel
{
    protected $table = 'workload';
    protected $fillable = [
        'id',
        'teacher_id',
        'discipline_id',
        'academic_year',
        'semester',
        'groups',
        'students',
        'control_type'
    ];

    public static function getAll($table, $select = '*') {
        if (is_array($select)) {
            $select = implode(',', $select);
        }
        $sql = DB::table($table)
            ->select($select, 't.name as teacher_name', 't.lastname as teacher_lastname', 'd.name as discipline_name')
            ->join('teacher as t', $table . '.teacher_id', '=', 't.id')
            ->join('discipline as d', $table . '.discipline_id', '=', 'd.id');

        return $sql->get();
    }
}
