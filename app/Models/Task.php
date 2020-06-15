<?php

namespace App\Models;

use App\Core\Model;
use App\Config\Database;

class Task extends Model
{
    /**
     * @var
     */
    public $id;

    /**
     * @var
     */
    public $title;
    /**
     * @var
     */
    public $description;

    /**
     * @param $column
     * @return mixed
     */
    public function get($column) {
        return $this->{$column};
    }

    /**
     * @param $column
     * @param $value
     */
    public function set($column, $value) {
        $this->{$column} = $value;
    }

    /**
     * @param array $columns
     */
    public function setAll($columns = [])
    {
        foreach ($columns as $column => $value) {
            if (property_exists(get_class($this), $column)) {
                $this->{$column} = $value;
            }
        }

    }
}


