<?php

require_once __DIR__ . "/Todo.php";

class Database
{
    private $host = "localhost";
    private $user = "root";
    private $pass = "";
    private $db = "todos-db";

    private $conn;

    public function __construct()
    {
        $this->conn = mysqli_connect($this->host, $this->user, $this->pass, $this->db);

        if (!$this->conn) {
            die("Connection failed");
        }
    }
}
