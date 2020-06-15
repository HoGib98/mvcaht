<?php


namespace App\Models\Resource;


use App\Config\Database;

class TaskResourceModel extends ResourceModel
{
    public function __construct()
    {
        $this->__init('tasks');
    }

}