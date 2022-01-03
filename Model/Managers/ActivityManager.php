<?php

namespace Model\Managers;

require_once(__DIR__ . '/../Entities/Activity.php');
require_once(__DIR__.'/../Entities/Entity.php');
require_once('PDOManager.php');

use Model\Entities\Activity;
use Model\Entities\Entity;
use PDOStatement;

/**
 *
 */
class ActivityManager extends PDOManager
{
    /**
     * @param int $id
     * @return Entity|null
     */
    public function findById(int $id): ?Entity
    {
        //Préparation du PDOStatement
        $stmt = $this->executePrepare("select * from secteur where id=:id", ['id' => $id]);
        $activity = $stmt->fetch();

        //Si on ne trouve pas l'activité on renvoie NULL
        if (!$activity)
            return null;

        return new Activity($activity['ID'],$activity['LIBELLE']);
    }

    /**
     * @return PDOStatement
     */
    public function find(): PDOStatement
    {
        //Préparation du PDOStatement
        $stmt=$this->executePrepare("select * from secteur",[]);
        return $stmt;
    }

    /**
     * @param int $pdoFecthMode
     * @return array
     */
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

    /**
     * @param Entity $e
     * @return PDOStatement
     */
    public function insert(Entity $e): PDOStatement
    {
        $req = "insert into secteur(id, libelle) values (:id, :libelle)";
        $params = array('id' => $e->getId(), 'libelle' => $e->getLabel());
        $res = $this->executePrepare($req,$params);
        return $res;
    }

    /**
     * @param int $id
     * @return PDOStatement
     */
    public function delete(int $id): PDOStatement
    {
        $req = "delete from secteurs_structures where ID_SECTEUR = :id";
        $params = array('id' => $id);
        $this->executePrepare($req,$params);

        $req = "delete from secteur where id=:id";
        $params = array('id' => $id);

        $res = $this->executePrepare($req,$params);
        return $res;
    }

    /**
     * @param Entity $e
     * @return PDOStatement
     */
    public function update(Entity $e): PDOStatement
    {
        $req = "update secteur set libelle = :libelle where id = :id";
        $params = array('libelle' => $e->getLabel(), 'id' => $e->getId());

        $res = $this->executePrepare($req,$params);
        return $res;
    }


}