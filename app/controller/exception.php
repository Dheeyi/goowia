<?php
/**
 * Created by PhpStorm.
 * User: william
 * Date: 6/1/17
 * Time: 3:15 PM
 */

namespace app\controller;


class Handler implements \Illuminate\Contracts\Debug\ExceptionHandler {
    public function report(\Exception $e) {
        throw $e;
    }

    public function render($request, \Exception $e) {
        throw $e;
    }

    public function renderForConsole($output, \Exception $e) {
        throw $e;
    }
}