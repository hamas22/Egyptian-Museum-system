<?php

class ticket
{
    private $id;
    private $name;
    private $email;
    private $visitType;
    private $date;
    private $time;
    private $noOfTickets;

    public function setId($id) { 
      $this->id = $id;
     }
    public function getId() {
       return $this->id;
       }

    public function __construct()
    {

    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }

    public function setVisitType($visitType)
    {
        $this->visitType = $visitType;
    }

    public function setDate($date)
    {
        $this->date = $date;
    }

    public function setTime($time)
    {
        $this->time = $time;
    }

    public function setNoOfTickets($noOfTickets)
    {
        $this->noOfTickets = $noOfTickets;
    }

    public function getName()
    {
        return $this->name;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function getVisitType()
    {
        return $this->visitType;
    }

    public function getDate()
    {
        return $this->date;
    }

    public function getTime()
    {
        return $this->time;
    }

    public function getNoOfTickets()
    {
        return $this->noOfTickets;
    }
    private $price;

public function setPrice($price)
{
    $this->price = $price;
}

public function getPrice()
{
    return $this->price;
}

}
?>
