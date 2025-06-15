<?php
require_once '../../controllers/controle.php'; 

$museumController = new museum_controller();

if (!$museumController->openconnection()) {
    die("Failed to connect to the database.");
}

if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $eventId = $museumController->escape_string($_GET['id']);

    $query = "DELETE FROM event WHERE event_Id = $eventId";
    $deleteResult = $museumController->delete($query);

    if ($deleteResult === true) {
        header("Location: event.php");
        exit();
    } else {
        echo "Error deleting event: " . $deleteResult;
    }
} else {
    echo "Invalid event ID.";
}

$museumController->closeconnection(); 
?>