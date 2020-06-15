<?php

namespace App\Controllers;

use App\Models\Repository\TaskRepository;
use App\Models\Task;

class TasksController extends Controller
{
    public $taskRepo;

    public function __construct()
    {
        $this->taskRepo = new TaskRepository();
    }

    /**
     *
     */
    function index()
    {
        $d['tasks'] = $this->taskRepo->getAll();

        $this->set($d);
        $this->render("index");
    }

    /**
     *
     */
    function create()
    {
        if (isset($_POST["title"])) {
            $task = new Task();
            $task->set('title', $_POST["title"]);
            $task->set('description', $_POST["description"]);
            if ($this->taskRepo->save($task)) {
                header("Location: /");
            }
        }

        $this->render("create");
    }

    /**
     * @param $id
     */
    function edit($id)
    {
        $d["task"] = $this->taskRepo->get($id);

        if (isset($_POST["title"])) {
            $d["task"]->set('title', $_POST["title"]);
            $d["task"]->set('description', $_POST["description"]);

            if ($this->taskRepo->update($d["task"])) {
                header("Location: /");
            }
        }
        $this->set($d);
        $this->render("edit");
    }

    /**
     * @param $id
     */
    function delete($id)
    {
        if ($this->taskRepo->delete($id)) {
            header("Location: /");
        }
    }
}

