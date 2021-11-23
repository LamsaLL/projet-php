<?php

namespace Model\Entities;

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
     * @return int
     */
    public function getId(): int
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId(int $id): void
    {
        $this->id = $id;
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