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
    private $pmLicense;

    /**
     * PMConnection constructor.
     * @param $pmInstance
     * @param $pmServer
     * @param $pmDatabase
     * @param $pmUser
     * @param $pmLicense
     */
    public function __construct($pmInstance, $pmServer, $pmDatabase, $pmUser, $pmLicense)
    {
        $this->pmInstance = $pmInstance;
        $this->pmServer = $pmServer;
        $this->pmDatabase = $pmDatabase;
        $this->pmUser = $pmUser;
        $this->pmLicense = $pmLicense;
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

    /**
     * @return mixed
     */
    public function getPmLicense()
    {
        return $this->pmLicense;
    }

    /**
     * @param mixed $pmLicense
     */
    public function setPmLicense($pmLicense)
    {
        $this->pmLicense = $pmLicense;
    }

    public function saveDataConnection($c)
    {
        $table = $c->get('db')->table('PM_CONNECTIONS');
        $x = new \app\controller\PmConnectionController($table);
        $data['PM_INSTANCE'] = $this->getPmInstance();
        $data['PM_SERVER'] = $this->getPmServer();
        $data['PM_DATABASE'] = $this->getPmDatabase();
        $data['PM_USER'] = $this->getPmServer();

        $widgets = $x->saveData($data);
        $widgets = $widgets->all();
        return $widgets;

//        $dev->PM_INSTANCE = $this->getPmInstance();
//        $dev->PM_SERVER = $this->getPmServer();
//        $dev->PM_DATABASE = $this->getPmDatabase();
//        $dev->PM_USER = $this->getPmServer();

        $table->save();
return 'wil';
//        return $response->withStatus(201)->getBody()->write($dev->toJson());
    }
}