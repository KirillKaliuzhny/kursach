<?php

namespace App\Models;

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
}
