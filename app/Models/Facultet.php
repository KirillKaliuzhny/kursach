<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;

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

    public function addData(array $columns, string $table, array $values)
    {
        foreach ($values as $key => &$value) {
            if (!in_array($key, ['id', 'frame'])) {
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
            if (!in_array($value, ['id', 'frame'])) {
                $result[] = $value . "= N'".$update[$value]."'";
            }else {
                $result[] = $value . "= ".$update[$value];
            }
        }
        return parent::editData($this->table, $result, $id);
    }
}
