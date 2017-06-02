<?php
/**
 * Created by PhpStorm.
 * User: william
 * Date: 6/1/17
 * Time: 11:34 AM
 */

namespace Goowia\Connection\PMConnections;


use app\controller\PmConnectionController;

class PMConnection
{
    private $pmInstance;
    private $pmServer;
    private $pmDatabase;
    private $pmUser;

    /**
     * PMConnection constructor.
     * @param $pmInstance
     * @param $pmServer
     * @param $pmDatabase
     * @param $pmUser
     */
    public function __construct($pmInstance, $pmServer, $pmDatabase, $pmUser)
    {
        $this->pmInstance = $pmInstance;
        $this->pmServer = $pmServer;
        $this->pmDatabase = $pmDatabase;
        $this->pmUser = $pmUser;
    }

    /**
     * @return mixed
     */
    public function getPmInstance()
    {
        return $this->pmInstance;
    }

    /**
     * @param mixed $pmInstance
     */
    public function setPmInstance($pmInstance)
    {
        $this->pmInstance = $pmInstance;
    }

    /**
     * @return mixed
     */
    public function getPmServer()
    {
        return $this->pmServer;
    }

    /**
     * @param mixed $pmServer
     */
    public function setPmServer($pmServer)
    {
        $this->pmServer = $pmServer;
    }

    /**
     * @return mixed
     */
    public function getPmDatabase()
    {
        return $this->pmDatabase;
    }

    /**
     * @param mixed $pmDatabase
     */
    public function setPmDatabase($pmDatabase)
    {
        $this->pmDatabase = $pmDatabase;
    }

    /**
     * @return mixed
     */
    public function getPmUser()
    {
        return $this->pmUser;
    }

    /**
     * @param mixed $pmUser
     */
    public function setPmUser($pmUser)
    {
        $this->pmUser = $pmUser;
    }



    public function saveDataConnection($c)
    {
        $pmController = new \app\controller\PmConnectionsController();
        $pmController->ID = null;
        $pmController->PM_INSTANCE = $this->getPmInstance();
        $pmController->PM_SERVER  = $this->getPmServer();
        $pmController->PM_DATABASE  = $this->getPmDatabase();
        $pmController->PM_USER  = $this->getPmServer();
        $pmController->save();
        return $pmController;
    }
}