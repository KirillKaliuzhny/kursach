<?php

namespace App\Models;

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
}
