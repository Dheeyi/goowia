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

    /**
     * @param $c
     * @return mixed
     */
    public function getTasks($c)
    {
        return $this->task->getAllData($c);
    }
}