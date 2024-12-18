<?php

namespace App\Models;

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
}
