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

    public function add_task(Todo $todo)
    {
        $query = "INSERT INTO todos (title, `date`) VALUES (?, ?)";

        $stmt = mysqli_prepare($this->conn, $query);

        //try to keep date as a string
        $stmt->bind_param("ss", $todo->title, $todo->date);

        $success = $stmt->execute();

        return $success;
    }

    public function get_tasks()
    {
        $query = "SELECT * FROM todos";

        $result = mysqli_query($this->conn, $query);

        //make result into associative array
        $db_todos = mysqli_fetch_all($result, MYSQLI_ASSOC);

        $todos = [];

        foreach ($db_todos as $db_todo) {
            //since its an associative array we reach properties thru [""]
            $title = $db_todo["title"];
            $date = $db_todo["date"];

            $id = $db_todo["id"];

            //need to add to the array so dont forget []
            $todos[] = new Todo($title, $date, $id);
        }

        return $todos;
    }
}
