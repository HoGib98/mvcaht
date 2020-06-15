<?php


namespace App\Models\Resource;


interface ResourceModelInterface
{
    public function __init($table);

    public function save($model);

    public function delete($model);
}