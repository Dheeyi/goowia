<?php

namespace Goowy\Services\Task;

class Task
{
    public $task;

    /**
     * Task constructor.
     */
    public function __construct()
    {
        $this->task = new \Goowy\BusinessModel\Task\Task();
    }

    public function getTasks($dbo)
    {
        return $this->task->getAllData($dbo);
    }
}