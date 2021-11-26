<?php
namespace Controller;

require_once(__DIR__.'/../Model/Managers/PDOManager.php');

use Model\Entities\Entity;
use Model\Managers\PDOManager;
use \PDOStatement;
use \PDO;

abstract class AController
{
    //protected PDOManager $manager;
    protected PDOManager $manager;

    /**
     * @return PDOManager
     */
    public function getManager(): PDOManager
    {
        return $this->manager;
    }

    /**
     * @param PDOManager $manager
     */
    public function setManager(PDOManager $manager): void
    {
        $this->manager = $manager;
    }

    /**
     * @param int $id
     * @return Entity
     */
    public function findById(int $id): ?Entity
    {
        return($this->getManager()->findById($id));
    }

    /**
     * @return PDOStatement
     */
    public function find(): PDOStatement
    {
        return($this->getManager()->find());
    }

    /**
     * @return array
     */
    public function findAll(): array
    {
        return($this->getManager()->findAll(PDO::FETCH_ASSOC));
    }

    /**
     * @param Entity $o
     */
    public function insert(Entity $e): void
    {
        $this->getManager()->insert($e);
    }
}