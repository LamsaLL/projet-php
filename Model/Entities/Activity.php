<?php

namespace Model\Entities;

require_once('Entity.php');

class Activity extends Entity
{
    private string $label;

    /**
     * @param int|null $id
     * @param string $label
     */
    public function __construct(?int $id, string $label)
    {
        parent::__construct($id);
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function getLabel(): string
    {
        return $this->label;
    }

    /**
     * @param string $label
     */
    public function setLabel(string $label): void
    {
        $this->label = $label;
    }

    /**
     * @return string
     */
    public function __toString(): string
    {
        // TODO: Implement __toString() method.
        return "";
    }


}