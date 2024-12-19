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
    public function addData(array $columns, string $table, array $values)
    {
        foreach ($values as $key => &$value) {
            if (!in_array($key, ['id', 'quantity', 'cycle'])) {
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
            if (!in_array($value, ['id', 'quantity', 'cycle'])) {
                $result[] = $value . "= N'".$update[$value]."'";
            }else {
                $result[] = $value . "= ".$update[$value];
            }
        }
        return parent::editData($this->table, $result, $id);
    }
}
