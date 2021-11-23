<?php

namespace Model\Managers;

use Model\Entities\Entity;
use Model\Entities\OrganizationActivity;
use PDOStatement;

class OrganizationActivityManager extends PDOManager
{
    public function findById(int $id): ?Entity
    {
        //Préparation du PDOStatement
        $stmt = $this->executePrepare("select * from secteurs_structures where id=:id", [ 'id' => $id]);
        $organizationActivity = $stmt->fetch();

        //Si on ne trouve pas l'activité on renvoie NULL
        if (!$organizationActivity)
            return null;

        return new OrganizationActivity($organizationActivity['ID'],$organizationActivity['ID_STRUCTURE'],$organizationActivity['ID_SECTEUR']);
    }

    public function find(): PDOStatement
    {
        $stmt = $this->executePrepare("select * from secteur_structures",[]);
        return $stmt;
    }

    public function findAll(int $pdoFecthMode): array
    {
        $stmt = $this->find();
        $organizationsActivities = $stmt->fetchAll($pdoFecthMode);

        $organization_activity_entities=[];
        foreach($organizationsActivities as $organizationActivity) {
            $organization_activity_entities[] = new OrganizationActivity($organizationActivity['ID'],$organizationActivity['ID_STRUCTURE'],$organizationActivity['ID_SECTEUR']);
        }
        return $organizationsActivities;
    }

    public function insert(Entity $e): PDOStatement
    {
        $req = "insert into secteurs_structures(id, idStructure, idSecteur) values (:id, :idStructure, :idSecteur)";
        $params = array('id' => $e->getId(), 'idStructure' => $e->getOrganizationId(), 'idSecteur' => $e->getActivityId());
        $res = $this->executePrepare($req,$params);
        return $res;
    }

}