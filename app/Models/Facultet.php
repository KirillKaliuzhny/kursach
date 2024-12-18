<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;

class Facultet extends AbstractModel
{
    use HasFactory;

    protected $fillable = [
        'id',
        'name',
        'name_dekan',
        'classroom',
        'frame',
        'phone',
    ];

    protected $table = 'facultet';

}
