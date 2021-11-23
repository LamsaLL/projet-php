<?php

namespace Model\Entities;

abstract class Entity
{
    private int $id;

    /**
     * @param int|null $id
     */
    public function __construct(?int $id)
    {
        $this->id = $id;
    }
}