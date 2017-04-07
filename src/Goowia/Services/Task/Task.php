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
        try {
            $data = $this->task->getAllData($c);

            if ($data) {
                return $data;
            } else {
                throw new \PDOException('No records found.');
            }

        } catch (\PDOException $e) {
            echo '{"error":{"text":' . $e->getMessage() . '}}';
        }

    }
}