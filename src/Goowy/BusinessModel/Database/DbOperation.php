<?php

namespace Goowy\BusinessModel\Database;


class DbOperation
{
    /**
     * @var
     */
    private $pdo;

    /**
     * DbOperation constructor.
     */
    function __construct()
    {
        $this->pdo = ConnectionFactory::getFactory()->getConnection();
    }

    /**
     * @param $name
     * @param $username
     * @param $pass
     * @return int
     */
    public function createStudent($name, $username, $pass)
    {
        if (!$this->isStudentExists($username)) {
            $apikey = $this->generateApiKey();
            $selectStatement = $this->pdo->insert(array('id', 'name', 'username', 'password', 'api_key'))
                ->into('students')
                ->values(array(null, $name, $username, md5($pass), $apikey));

            $result = $selectStatement->execute();
            if ($result) {
                return 0;
            } else {
                return 1;
            }
        } else {
            return 2;
        }
    }

    /**
     * @param $username
     * @param $pass
     * @return bool
     */
    public function studentLogin($username, $pass)
    {
        $selectStatement = $this->pdo->select()
            ->from('students')
            ->where('username', '=', $username)
            ->where('password', '=', $pass);

        $stmt = $selectStatement->execute();
        $data = $stmt->fetch();

        return $data > 0;
    }

    /**
     * @param $username
     * @return mixed
     */
    public function getStudent($username)
    {
        $selectStatement = $this->pdo->select()
            ->from('students')
            ->where('username', '=', $username);

        $stmt = $selectStatement->execute();
        $data = $stmt->fetch();

        return $data;
    }

    /**
     * @param $username
     * @return bool
     */
    private function isStudentExists($username)
    {
        $selectStatement = $this->pdo->select()
            ->from('students')
            ->where('username', '=', $username);

        $stmt = $selectStatement->execute();
        $data = $stmt->fetch();
        $numsRows = $stmt->rowCount();
        return $numsRows > 0;
    }

    /**
     * @param $id
     * @return mixed
     */
    private function getAssignments($id)
    {
        $selectStatement = $this->pdo->select()
            ->from('assignments')
            ->where('students_id', '=', $id);

        $stmt = $selectStatement->execute();
        $assignments = $stmt->fetch();

        return $assignments;
    }

    /**
     * Methods to check a user is valid or not using api key
     * I will not write comments to every method as the same thing is done in each method
     * @param $api_key
     * @return bool
     */
    public function isValidStudent($api_key)
    {
        $selectStatement = $this->pdo->select()
            ->from('students')
            ->where('api_key', '=', $api_key);

        $stmt = $selectStatement->execute();
        $assignments = $stmt->fetch();

        return $assignments > 0;
    }

    /**
     * This method will generate a unique api key
     * @return string
     */
    private function generateApiKey()
    {
        return md5(uniqid(rand(), true));
    }
}