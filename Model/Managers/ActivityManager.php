<?php

namespace Model\Managers;

use Model\Entities\Activity;
use Model\Entities\Entity;
use PDOStatement;

class ActivityManager extends PDOManager
{
    public function findById(int $id): ?Entity
    {
        //Préparation du PDOStatement
        $stmt = $this->executePrepare("select * from secteur where id=:id", [ 'id' => $id]);
        $activity = $stmt->fetch();

        //Si on ne trouve pas l'activité on renvoie NULL
        if (!$activity)
            return null;

        return new Activity($activity['ID'],$activity['LIBELLE']);
    }

    public function find(): PDOStatement
    {
        //Préparation du PDOStatement
        $stmt=$this->executePrepare("select * from secteur",[]);
        return $stmt;
    }

    public function findAll(int $pdoFecthMode): array
    {
        $stmt = $this->find();
        $activities = $stmt->fetchAll($pdoFecthMode);

        $activityEntities=[];
        foreach($activities as $activity) {
            $activityEntities[] = new Activity($activity['ID'],$activity['LIBELLE']);
        }
        return $activityEntities;
    }

    public function insert(Entity $e): PDOStatement
    {
        $req = "insert into secteur(id, libelle) values (:id, :libelle)";
        $params = array('id' => $e->getId(), 'libelle' => $e->getLabel());
        $res = $this->executePrepare($req,$params);
        return $res;
    }
}