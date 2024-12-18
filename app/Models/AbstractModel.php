<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
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
    public static function getTableColumns($table)
    {
        $sql = DB::select("
            SELECT COLUMN_NAME
            FROM INFORMATION_SCHEMA.COLUMNS
            WHERE TABLE_NAME = '". $table ."'
        ");
        return array_column($sql, 'COLUMN_NAME');
    }
}
