<?php

namespace Goowy\BusinessModel\Task;

class Task
{
    /**
     * @param $c
     * @return mixed
     */
    public function getAllData($c)
    {
        $view = new \Slim\Views\Twig('');
        $logger = $c->get('logger');
        $table = $c->get('db')->table('task');
        return new \app\controller\TaskController($view, $logger, $table);
    }
}