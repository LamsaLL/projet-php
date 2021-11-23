<?php

namespace Model\Managers;

use Model\Entities\Entity;
use PDOStatement;

class ActivityManager extends PDOManager
{
    public function findById(int $id): ?Entity
    {
        // TODO: Implement findById() method.
    }

    public function find(): PDOStatement
    {
        // TODO: Implement find() method.
    }

    public function findAll(int $pdoFecthMode): array
    {
        // TODO: Implement findAll() method.
    }

    public function insert(Entity $e): PDOStatement
    {
        // TODO: Implement insert() method.
    }

}