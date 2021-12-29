<?php

namespace Model\Managers;

require_once(__DIR__ . '/../Entities/Organization.php');
require_once(__DIR__.'/../Entities/Entity.php');
require_once('PDOManager.php');

use Model\Entities\Entity;
use Model\Entities\Organization;
use PDOStatement;

class OrganizationManager extends PDOManager
{

    /**
     * @param int $id
     * @return Entity|null
     */
    public function findById(int $id): ?Entity
    {
        $stmt = $this->executePrepare("select * from structure where id=:id", [ 'id' => $id]);
        $organization = $stmt->fetch();
        if (!$organization) return null;
        return new Organization($organization['ID'],$organization['NOM'],$organization['RUE'],$organization['CP'],
            $organization['VILLE'], $organization['ESTASSO'],$organization['NB_DONATEURS'], $organization['NB_ACTIONNAIRES']);
    }


    /**
     * @return PDOStatement
     */
    public function find(): PDOStatement
    {
        $stmt=$this->executePrepare("select * from structure",[]);
        return $stmt;
    }

    /**
     * @param int $pdoFecthMode
     * @return array
     */
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

    /**
     * @param Entity $e
     * @return PDOStatement
     */
    public function insert(Entity $e): PDOStatement
    {
        $req = "insert into structure(id, nom, rue, cp, ville, estasso, nb_donateurs, nb_actionnaires) values (:id, :nom, :rue, 
        :cp, :ville, :estasso, :nb_donateurs, :nb_actionnaires)";
        $params = array('id' => $e->getId(), 'nom' => $e->getName(),'rue' => $e->getStreet(), 'cp' => $e->getPostalCode(), 'ville' => $e->getCity(),
        'estasso' => $e->getIsAssociation(), 'nb_donateurs' => $e->getDonorsNumber(), 'nb_actionnaires' => $e->getInvestorsNumber());
        $res=$this->executePrepare($req,$params);
        return $res;
    }

    /**
     * @param int $id
     * @return PDOStatement
     */
    public function delete(int $id): PDOStatement
    {
        $req = "delete from secteurs_structures where ID_STRUCTURE = :id";
        $params = array('id' => $id);
        $this->executePrepare($req,$params);

        $req = "delete from structure where id=:id";
        $params = array('id' => $id);

        $res = $this->executePrepare($req,$params);
        return $res;
    }

}