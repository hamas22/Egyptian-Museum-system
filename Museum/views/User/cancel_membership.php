<?php
session_start();
require_once '../../controllers/controle.php'; 

$user_id = $_SESSION['user_id'];
$type = $_GET['type'];


$museumController = new museum_controller();


if ($museumController->openconnection()) {
    
    $query = "DELETE FROM membership WHERE user_id = $user_id AND type_of_membership = '$type'";

 
    if ($museumController->delete($query) === true) {
      
        header("Location: membership.php?cancel=success");
        exit();
    } else {
      
        header("Location: membership.php?cancel=failed&error=" . urlencode($museumController->delete($query)));
        exit();
    }



} else {
    die("Failed to connect to the database.");
}
?>