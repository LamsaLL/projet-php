<?php

namespace Model\Managers;

require_once(__DIR__ . '/../Entities/Organization.php');
require_once(__DIR__.'/../Entities/Entity.php');
require_once('PDOManager.php');


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
        $organizationsActivity = $stmt->fetchAll($pdoFecthMode);

        //On crée un tableau qui stockera les objets OrganizationActivity
        $organizationsActivityEntities=[];

        //On parcours les données récupérées de la bdd et on crée des objets OrganizationActivity
        foreach($organizationsActivity as $organizationActivity) {
            $organizationsActivityEntities[] = new OrganizationActivity($organizationActivity['ID'],$organizationActivity['ID_STRUCTURE'],$organizationActivity['ID_SECTEUR']);
        }

        //On renvoie le tableau créé précedemment maintenant populated
        return $organizationsActivityEntities;
    }

    public function insert(Entity $e): PDOStatement
    {
        $req = "insert into secteurs_structures(id, idStructure, idSecteur) values (:id, :idStructure, :idSecteur)";
        $params = array('id' => $e->getId(), 'idStructure' => $e->getOrganizationId(), 'idSecteur' => $e->getActivityId());
        $res = $this->executePrepare($req,$params);
        return $res;
    }

}