<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Facades\DB;
class AbstractModel extends Model
{
    public static function getAll($table, $select = '*')
    {
        if (is_array($select)) {
            $select = implode(',', $select);
        }
        $sql = DB::select("
            select ". $select ." from ".$table."
        ");
        return collect($sql)->map(function ($product) {
            return new static((array)$product);
        });
    }
}
