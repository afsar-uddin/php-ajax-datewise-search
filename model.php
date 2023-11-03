<?php 

class Model {
    private $server = "localhost";
    private $username = "root";
    private $password = "";
    private $db = "php-ajax-datewise-search";
    private $conn;


    public function __construct() {
        try {
            $this->conn = new mysqli($this->server, $this->username, $this->password, $this->db);
        } catch(\Throwable $th) {
            echo "Connection error " . $th->getMessage();
        }
    }

    public function fetch() {
        $date = [];

        $query = "SELECT * FROM students";
        if($sql = $this->conn->query($query)) {
            while($row = mysqli_fetch_assoc($sql)) {
                $date[] = $row;
            }
        }

        return $date;
    }
}
