<?php

namespace Model\Managers;

use Model\Entities\Entity;
use Model\Entities\Organization;
use PDOStatement;

class OrganizationManager extends PDOManager
{
    public function findById(int $id): ?Entity
    {
        $stmt = $this->executePrepare("select * from structure where id=:id", [ 'id' => $id]);
        $organization = $stmt->fetch();
        if (!$organization) return null;
        return new Organization($organization['ID'],$organization['NOM'],$organization['RUE'],$organization['CP'],
            $organization['VILLE'], $organization['ESTASSO'],$organization['NB_DONATEURS'], $organization['NB_ACTIONNAIRES']);
    }
    

    public function find(): PDOStatement
    {
        $stmt=$this->executePrepare("select * from structure",[]);
        return $stmt;
    }

    public function findAll(int $pdoFecthMode): array
    {
        $stmt=$this->find();
        $organizations = $stmt->fetchAll($pdoFecthMode);

        $organizationsEntities=[];
        foreach($organizations as $organization) {
            $organizationsEntities[] = new Organization($organization['ID'],$organization['NOM'],$organization['RUE'],
                $organization['CP'],$organization['VILLE'],
                $organization['ESTASSO'],$organization['NB_DONATEURS'], $organization['NB_ACTIONNAIRES']);
        }
        return $organizationsEntities;

    }

    public function insert(Entity $e): PDOStatement
    {
        $req = "insert into structure(id, nom, rue, cp, ville, estasso, nb_donateurs, nb_actionnaires) values (:id, :nom, :rue, 
        :cp, :ville, :estasso, :nb_donateurs, :nb_actionnaires)";
        $params = array('id' => $e->getId(), 'rue' => $e->setStreet(), 'cp' => $e->getPostalCode(), 'ville' => $e->getCity(), 
        'estasso' => $e->getIsAssociation(), 'nb_donateurs' => $e->getDonorsNumber(), 'nb_actionnaires' => $e->getInvestorsNumber());
        $res=$this->executePrepare($req,$params);
        return $res;
    }

}