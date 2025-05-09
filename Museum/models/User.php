<?php
abstract class User {
    public $id;
    public $name;
    public $email;
    public $gender;

    public function __construct($id, $name, $email, $gender) {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->gender = $gender;
    }

    abstract public static function fromArray($row);
}
?>
