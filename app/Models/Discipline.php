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
}
