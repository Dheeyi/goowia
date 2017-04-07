<?php

namespace Goowia\Services\Task;

class Task
{
    public $task;

    /**
     * Task constructor.
     */
    public function __construct()
    {
        $this->task = new \Goowia\BusinessModel\Task\Task();
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