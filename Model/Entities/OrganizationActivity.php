<?php

namespace Model\Entities;

require_once('Entity.php');

class OrganizationActivity extends Entity
{
    private int $organizationId;
    private int $activityId;
    
    /**
     * @param int|null $id
     * @param int $organizationId
     * @param int $activityId
     */
    public function __construct(?int $id, int $organizationId, int $activityId)
    {
        parent::__construct($id);
        $this->organizationId = $organizationId;
        $this->activityId = $activityId;
    }

    /**
     * @return int
     */
    public function getOrganizationId(): int
    {
        return $this->organizationId;
    }

    /**
     * @param int $organizationId
     */
    public function setOrganizationId(int $organizationId): void
    {
        $this->organizationId = $organizationId;
    }

    /**
     * @return int
     */
    public function getActivityId(): int
    {
        return $this->activityId;
    }

    /**
     * @param int $activityId
     */
    public function setActivityId(int $activityId): void
    {
        $this->activityId = $activityId;
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