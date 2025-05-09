<?php
require_once '../../controllers/controle.php'; 
$museumController = new museum_controller();

if (!$museumController->openconnection()) {
    die("Failed to connect to the database.");
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $id = $museumController->escape_string($_POST['event_Id']);
    $title = $museumController->escape_string($_POST['eventName']);
    $desc = $museumController->escape_string($_POST['eventDescription']);
    $date = $_POST['eventDate']; 

    $sql = "UPDATE event SET title='$title', description='$desc', date='$date' WHERE event_Id=$id";

    if ($museumController->update($sql)) { 
        header("Location: event.php");
        exit();
    } else {
        echo "Error: " . $museumController->connection->error; 
    }
}

$museumController->closeconnection();
?>