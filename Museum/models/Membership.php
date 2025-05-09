<?php

class Membership
{
    private $id;
    private $name;
    private $email;
    private $type;
    private $startDate;
    private $expiryDate;
    private $status;

    public function __construct() {}

    public function setId($id) {
        $this->id = $id;
    }
    public function getId() {
        return $this->id;
    }

    public function setName($name) {
        $this->name = $name;
    }
    public function getName() {
        return $this->name;
    }

    public function setEmail($email) {
        $this->email = $email;
    }
    public function getEmail() {
        return $this->email;
    }

    public function setType($type) {
        $this->type = $type;
    }
    public function getType() {
        return $this->type;
    }

    public function setStartDate($startDate) {
        $this->startDate = $startDate;
    }
    public function getStartDate() {
        return $this->startDate;
    }

    public function setExpiryDate($expiryDate) {
        $this->expiryDate = $expiryDate;
    }
    public function getExpiryDate() {
        return $this->expiryDate;
    }

    public function setStatus($status) {
        $this->status = $status;
    }
    public function getStatus() {
        return $this->status;
    }
}

?>
