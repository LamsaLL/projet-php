<?php

namespace Model\Entities;

require_once('Entity.php');

class Organization extends Entity
{
    private string $name;
    private string $street;
    private string $postalCode;
    private string $city;
    private bool $isAssociation;
    private ?int $donorsNumber;
    private ?int $investorsNumber;

    /**
     * @param int|null $id
     * @param string $name
     * @param string $street
     * @param string $postalCode
     * @param string $city
     * @param bool $isAssociation
     * @param int|null $donorsNumber
     * @param int|null $investorsNumber
     */
    public function __construct(?int $id, string $name, string $street, string $postalCode, string $city, bool $isAssociation, ?int $donorsNumber, ?int $investorsNumber)
    {
        parent::__construct($id);
        $this->name = $name;
        $this->street = $street;
        $this->postalCode = $postalCode;
        $this->city = $city;
        $this->isAssociation = $isAssociation;
        $this->donorsNumber = $donorsNumber;
        $this->investorsNumber = $investorsNumber;
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName(string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getStreet(): string
    {
        return $this->street;
    }

    /**
     * @param string $street
     */
    public function setStreet(string $street): void
    {
        $this->street = $street;
    }

    /**
     * @return string
     */
    public function getPostalCode(): string
    {
        return $this->postalCode;
    }

    /**
     * @param string $postalCode
     */
    public function setPostalCode(string $postalCode): void
    {
        $this->postalCode = $postalCode;
    }

    /**
     * @return string
     */
    public function getCity(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     */
    public function setCity(string $city): void
    {
        $this->city = $city;
    }

    /**
     * @return bool
     */
    public function isAssociation(): bool
    {
        return $this->isAssociation;
    }

    /**
     * @param bool $isAssociation
     */
    public function setIsAssociation(bool $isAssociation): void
    {
        $this->isAssociation = $isAssociation;
    }

    /**
     * @return int
     */
    public function getDonorsNumber(): int
    {
        return $this->donorsNumber;
    }

    /**
     * @param int $donorsNumber
     */
    public function setDonorsNumber(int $donorsNumber): void
    {
        $this->donorsNumber = $donorsNumber;
    }

    /**
     * @return int
     */
    public function getInvestorsNumber(): int
    {
        return $this->investorsNumber;
    }

    /**
     * @param int $investorsNumber
     */
    public function setInvestorsNumber(int $investorsNumber): void
    {
        $this->investorsNumber = $investorsNumber;
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