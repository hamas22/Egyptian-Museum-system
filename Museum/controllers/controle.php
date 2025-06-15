<?php
class museum_controller {
    public $dbhost = "localhost";
    public $dbuser = "root";
    public $dbpassowrd = "";
    public $dbName = "museum";
    public $connection;

  
    public function openconnection() {
        $this->connection = new mysqli($this->dbhost, $this->dbuser, $this->dbpassowrd, $this->dbName);
        if ($this->connection->connect_error) {
            return false;
        } else {
            return true;
        }
    }
    public function escape_string($string) {
        if ($this->connection) {
            return $this->connection->real_escape_string($string);
        }
        return $string; 
    }
    public function insert($query) {
        $this->connection->query($query);
    }


    public function select($query) {

        $result = $this->connection->query($query);
        if ($result) {
          
            return $result->fetch_all(MYSQLI_ASSOC);  
        } else {
            
            return false;
        }
    }
    public function closeconnection() {
        if ($this->connection) {
            $this->connection->close();
            $this->connection = null;
        }
    }
    public function delete($query) {
        if ($this->connection->query($query) === TRUE) {
            return true;
        } else {
            return $this->connection->error;
        }
    }
    public function update($query) {
        if ($this->connection->query($query) === TRUE) {
            return true;
        } else {
            return false; 
        }
    }
}

?>
