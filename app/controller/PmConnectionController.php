<?php
/**
 * Created by PhpStorm.
 * User: william
 * Date: 6/1/17
 * Time: 11:55 AM
 */

namespace app\controller;

use Illuminate\Database\Query\Builder;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class PmConnectionController
{
    protected $table;

    public function __construct(
        Builder $table
    ) {
        $this->table = $table;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $widgets = $this->table->get();

        return $widgets;
    }
    public function saveData($arrayData = array())
    {
        $table = $this->table;
        $table->PM_INSTANCE = $arrayData['PM_INSTANCE'];
        $table->PM_SERVER = $arrayData['PM_SERVER'];
        $table->PM_DATABASE = $arrayData['PM_DATABASE'];
        $table->PM_USER = $arrayData['PM_USER'];

        $table->save();

        $widgets = $this->table->get();

        return $widgets;
    }
}