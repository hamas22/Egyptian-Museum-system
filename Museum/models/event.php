<?php
require_once "../controllers/controle.php";

class Event {
    private $db;

    public function __construct() {
        $this->db = new museum_controller();
        $this->db->openconnection();
    }

    public function addEvent($title, $description, $date, $location) {
        $title = $this->db->escape_string($title);
        $description = $this->db->escape_string($description);
        $date = $this->db->escape_string($date);
        $location = $this->db->escape_string($location);

        $query = "INSERT INTO events (title, description, event_date, location)
                  VALUES ('$title', '$description', '$date', '$location')";
        return $this->db->insert($query);
    }

    public function getAllEvents() {
        $query = "SELECT * FROM events ORDER BY event_date ASC";
        return $this->db->select($query);
    }

    public function getEventById($id) {
        $id = intval($id);
        $query = "SELECT * FROM events WHERE id = $id";
        return $this->db->select($query);
    }

    public function updateEvent($id, $title, $description, $date, $location) {
        $title = $this->db->escape_string($title);
        $description = $this->db->escape_string($description);
        $date = $this->db->escape_string($date);
        $location = $this->db->escape_string($location);
        $id = intval($id);

        $query = "UPDATE events SET 
                  title = '$title',
                  description = '$description',
                  event_date = '$date',
                  location = '$location'
                  WHERE id = $id";

        return $this->db->update($query);
    }

    public function deleteEvent($id) {
        $id = intval($id);
        $query = "DELETE FROM events WHERE id = $id";
        return $this->db->delete($query);
    }

    public function __destruct() {
        $this->db->closeconnection();
    }
}
?>
