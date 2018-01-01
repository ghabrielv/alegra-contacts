<?php

class Application_Model_Contact
{
    public $id;
    public $name;
    public $identification ;
    public $email;
    public $phonePrimary;
    public $phoneSecondary;
    public $fax;
    public $mobile;
    public $observations;
    public $priceList;
    public $seller;
    public $term;
    public $address;
    public $type;
    public $internalContacts;

    public function __construct($row)
    {
        $this->setId($row['id']);
        $this->setName($row['name']);
        $this->setIdentification($row['identification']);
        $this->setEmail($row['email']);
        $this->setPhonePrimary($row['phonePrimary']);
        $this->setPhoneSecondary($row['phoneSecondary']);
        $this->setFax($row['fax']);
        $this->setMobile($row['mobile']);
        $this->setObservations($row['observations']);
        $this->setPriceList($row['priceList']);
        $this->setSeller($row['seller']);
        $this->setTerm($row['term']);
        $this->setAddress($row['address']);
        $this->setType($row['type']);
        $this->setInternalContacts($row['internalContacts']);

        return $this;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setId($id)
    {
        $this->id = (int)$id;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = (string)$name;
    }

    public function getIdentification()
    {
        return $this->identification;
    }

    public function setIdentification($identification)
    {
        $this->identification = (string)$identification;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = (string)$email;
    }

    public function getPhonePrimary()
    {
        return $this->phonePrimary;
    }

    public function setPhonePrimary($phonePrimary)
    {
        $this->phonePrimary = (string)$phonePrimary;
    }

    public function getPhoneSecondary()
    {
        return $this->phoneSecondary;
    }

    public function setPhoneSecondary($phoneSecondary)
    {
        $this->phoneSecondary = (string)$phoneSecondary;
    }

    public function getFax()
    {
        return $this->fax;
    }

    public function setFax($fax)
    {
        $this->fax = (string)$fax;
    }

    public function getMobile()
    {
        return $this->mobile;
    }

    public function setMobile($mobile)
    {
        $this->mobile = (string)$mobile;
    }

    public function getObservations()
    {
        return $this->observations;
    }

    public function setObservations($observations)
    {
        $this->observations = (string)$observations;
    }

    public function getPriceList()
    {
        return $this->priceList;
    }

    public function setPriceList($priceList)
    {
        $this->priceList = $priceList;
    }

    public function getSeller()
    {
        return $this->seller;
    }

    public function setSeller($seller)
    {
        $this->seller = $seller;
    }

    public function getTerm()
    {
        return $this->term;
    }

    public function setTerm($term)
    {
        $this->term = $term;
    }

    public function getAddress()
    {
        return $this->address;
    }

    public function setAddress($address)
    {
        $this->address = $address;
    }

    public function getType()
    {
        return $this->type;
    }

    public function setType($type)
    {
        $this->type = $type;
    }

    public function getInternalContacts()
    {
        return $this->internalContacts;
    }

    public function setInternalContacts($internalContacts)
    {
        $this->internalContacts = $internalContacts;
    }
}
