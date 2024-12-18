<?php

namespace App\Models;

class Discipline extends AbstractModel
{
    protected $table = 'discipline';
    protected $fillable = [
        'id',
        'name',
        'quantity',
        'cycle'
    ];
}
