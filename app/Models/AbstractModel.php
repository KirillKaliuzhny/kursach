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

    public function addData(array $columns, string $table, array $values)
    {
        unset($columns[0]);
        $columns = implode(',', $columns);
        $values = implode(',', array_values($values));
        return DB::insert("
            insert into ". $table ." ( ".$columns." ) values (".$values.")
        ");
    }
    public function editData(string $table, array $update, $id)
    {
        $update = implode(',', $update);
        return DB::update("
            update ". $table ."
            set ". $update ."
            where id = ". $id ."
        ");
    }
    public function getDataById(string $table, $id)
    {
        $sql = DB::select("
            select * from ".$table."
            where id = ". $id ."
        ");
        return ($sql);
    }
    public static function getDataByUpdate($table, $id) {
        $data = self::getTableColumns($table);
        $sql = DB::select("
            select * from ".$table."
            where id = ". $id);
        $sql = $sql[0];
        foreach ($data as &$columnData) {
            $columnData->VALUE = $sql->{$columnData->COLUMN_NAME};
        }
        return $data;
    }
    public static function deleteData(string $table, $id)
    {
        return DB::delete("
            delete from ".$table."
            where id = " . $id);
    }
}
