<?php

namespace Goowy\BusinessModel\Task;

class Task
{
    /**
     * @param $dbo
     * @return mixed
     */
    public function getAllData($dbo)
    {
        $sth = $dbo->db->select()
            ->from('tasks')
            ->orderBy('task');

        $stmt = $sth->execute();
        $allData = $stmt->fetchAll();

        return $allData;
    }
}