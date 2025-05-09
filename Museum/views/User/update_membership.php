<?php
session_start();
require_once '../../controllers/controle.php'; 

if (!isset($_SESSION['user_id']) || !isset($_POST['type_of_membership'])) {
    header("Location: membership.php");
    exit();
}

$user_Id = $_SESSION['user_id'];
$original_type = $_POST['original_type'];
$new_type = $_POST['type_of_membership'];
$start_date = $_POST['start_date'];
$last_date = $_POST['last_date'];


$conn = new museum_controller();


if ($conn->openconnection()) {
  
    $query = "UPDATE membership SET type_of_membership = '$new_type', start_date = '$start_date', last_date = '$last_date' WHERE user_Id = $user_Id AND type_of_membership = '$original_type'";

    
    if ($conn->update($query)) {
        header("Location: membership.php?update=success");
        exit();
    } else {
        header("Location: membership.php?update=failed");
        exit();
    }


} else {
    die("Connection failed.");
}
?>