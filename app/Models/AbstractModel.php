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
            SELECT
                c.COLUMN_NAME,
                c.DATA_TYPE,
                CASE
                    WHEN kc.COLUMN_NAME IS NOT NULL THEN 1
                    ELSE 0
                END AS DROPDOWN
            FROM
                INFORMATION_SCHEMA.COLUMNS AS c
            LEFT JOIN
                INFORMATION_SCHEMA.KEY_COLUMN_USAGE AS kc
                ON c.TABLE_NAME = kc.TABLE_NAME AND c.COLUMN_NAME = kc.COLUMN_NAME
                AND kc.CONSTRAINT_NAME IN (
                    SELECT CONSTRAINT_NAME
                    FROM INFORMATION_SCHEMA.TABLE_CONSTRAINTS
                    WHERE CONSTRAINT_TYPE = 'FOREIGN KEY'
                )
            WHERE
                c.TABLE_NAME = '".$table."';
        ");
        return collect($sql);
    }
}
