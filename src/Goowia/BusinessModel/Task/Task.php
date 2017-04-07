<?php

namespace Goowia\BusinessModel\Task;

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
        $varhola = new \app\controller\TaskController($view, $logger, $table);
        $widgets = $varhola->getTableTask();
        $widgets = $widgets->all();
        return $widgets;
    }
}