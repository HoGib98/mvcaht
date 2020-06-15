<?php


namespace App\Models\Repository;

use App\Models\Resource\TaskResourceModel;
use App\Models\Task;

class TaskRepository
{
    /**
     * @var TaskResourceModel
     */
    public $resource;

    /**
     * TaskRepository constructor.
     */
    public function __construct()
    {
        $this->resource = new TaskResourceModel();
    }

    /**
     * @param $model
     * @return mixed
     */
    public function save($model) {
        return $this->resource->save($model);
    }

    /**
     * @param $model
     * @return mixed
     */
    public function update($model) {
        return $this->resource->update($model);
    }

    /**
     * @param $id
     * @return Task
     */
    public function get($id) {
        $task = new Task();
        $task->setAll($this->resource->get($id));
        return $task;
    }

    /**
     * @param $id
     * @return bool
     */
    public function delete($id) {
        return $this->resource->delete($id);
    }

    /**
     * @return array
     */
    public function getAll() {
        $taskDb = $this->resource->getAll();
        $tasks = [];
        foreach ($taskDb as $data) {
            $task = new Task();
            $task->setAll($data);
            $tasks[] = $task;
        }
        return $tasks;
    }
}