<?php

namespace Crmp\Domain;

/**
 * Address
 *
 * An address usually contains information about a person or a company.
 *
 * @package Crmp\Domain
 */
class Address implements SoftDeleteInterface
{
    /**
     * Related addresses.
     *
     * @var Address[]
     */
    protected $relatedAddresses;
    /**
     * Child addresses.
     *
     * @var Address[]
     */
    protected $subAddresses;
    /**
     * EMail
     *
     * @var string
     */
    private $email;
    /**
     * Mark an address deprecated.
     *
     * @var bool
     */
    private $enabled;
    /**
     * Identifier
     *
     * @var int
     */
    private $id;
    /**
     * Name
     *
     * @var string
     */
    private $name;

    /**
     * Create new address.
     *
     * @param int    $id      Identifier for this address.
     * @param string $name    Name of the person or company.
     * @param string $email   E-Mail address of the person or company.
     * @param bool   $enabled Check this if the address should be disabled.
     */
    public function __construct($id, $name, $email, $enabled)
    {
        $this->id      = $id;
        $this->name    = $name;
        $this->email   = $email;
        $this->enabled = $enabled;
    }

    /**
     * Add a related address.
     *
     * @param Address $address
     */
    public function addRelatedAddress(Address $address)
    {
        $this->relatedAddresses[] = $address;
    }

    /**
     * @param Address $address
     */
    public function addSubAddress(Address $address)
    {
        $this->subAddresses[] = $address;
    }

    /**
     * Disable the entity.
     *
     * @return mixed
     */
    public function disable()
    {
        $this->enabled = false;
    }

    /**
     * Recover the entity.
     *
     * @return mixed
     */
    public function enable()
    {
        $this->enabled = true;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Get all related addresses.
     *
     * Addresses can not only be split into a tree
     * but also refer to some totally different addresses.
     * The difference between a sub-address
     * and a related address is,
     * that the related does not have to be a child or parent of the current address.
     * It can come from a total different place within the whole bulk of addresses.
     *
     * A company is not only about sectory,
     * which is covered by the sub addresses,
     * but also about vendors, suppliers
     * and other contractors.
     * Those are not part of the company
     * but have a relationship to each another.
     * Those relationships are covered by the related addresses.
     *
     * @return Address[]
     */
    public function getRelatedAddresses()
    {
        return $this->relatedAddresses;
    }

    /**
     * Receive child addresses.
     *
     * This will return all addresses that are summed up by this address.
     * An address can include several other addresses.
     * By doing this it wants to follow the principles that are given in every company.
     *
     * A company has a name (first address),
     * a CEO (simple sub address)
     * and some various sectors like marketing, production etc (each a sub address).
     * The "marketing" for instance is also an address with the name marketing
     * again containing plenty other addresses for each employee contact.
     *
     * Together with the related addresses the complexity of a whole company can be covered.
     *
     * @return Address[]
     */
    public function getSubAddresses()
    {
        return $this->subAddresses;
    }

    /**
     * Check if disabled.
     *
     * @return boolean
     */
    public function isEnabled()
    {
        return (bool) $this->enabled;
    }
}
