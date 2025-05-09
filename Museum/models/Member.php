<?php
require_once 'User.php';

class Member extends User {
    public function __construct($id, $name, $email, $gender) {
        parent::__construct($id, $name, $email, $gender);
    }

    public static function fromArray($row) {
        return new Member($row['user_Id'], $row['name'], $row['email'], $row['gender']);
    }
}
?>
