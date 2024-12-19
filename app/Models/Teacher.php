<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;

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
    public static function getTableColumns($table) {
        $data = parent::getTableColumns($table);
        foreach ($data as &$columnData) {
            if ($columnData->DROPDOWN == 1) {
                $foreignTable = explode('_',$columnData->COLUMN_NAME)[0];
                $select = ['id','name'];
                $select = implode(',', $select);
                $sql = DB::select("
                    select ". $select ." from ".$foreignTable."
                ");
                $columnData->VALUES = $sql;
            }
        }
        return $data;
    }
    public function addData(array $columns, string $table, array $values)
    {
        foreach ($values as $key => &$value) {
            if (!in_array($key, ['id', 'department_id', 'birth', 'employment', 'experience'])) {
                $value = "N'". $value ."'";
            }
        }
        return parent::addData($this->fillable, $this->table, $values);
    }
    public function editData(string $table, array $update, $id)
    {
        $params = $this->fillable;
        unset($params[0]);
        $result = [];
        foreach ($params as $value) {
            if (!in_array($value, ['id', 'department_id', 'birth', 'employment', 'experience'])) {
                $result[] = $value . "= N'".$update[$value]."'";
            }else {
                $result[] = $value . "= ".$update[$value];
            }
        }
        return parent::editData($this->table, $result, $id);
    }
    public function getDataById(string $table, $id)
    {
        $result = parent::getDataById($this->table, $id);

        $result = current($result);

        foreach ($result as $key => $value) {
            if (substr($key, -3) === "_id") {
                $searchTable = explode('_', $key)[0];
                $select = ['id','name'];
                $select = implode(',', $select);
                $sql = DB::select("
                    select ". $select ." from ".$searchTable."
                ");
                $propName = $searchTable.'_options';
                $result->{$propName} = $sql;
            }
        }
        return $result;
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
}
