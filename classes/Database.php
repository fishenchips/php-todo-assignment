<?php

require_once __DIR__ . "/Todo.php";
require_once __DIR__ . "/User.php";


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

    public function get_task_by_id($id)
    {
        $query = "SELECT * FROM todos WHERE id = ?";

        $stmt = mysqli_prepare($this->conn, $query);

        $stmt->bind_param("i", $id);

        $stmt->execute();

        $result = $stmt->get_result();

        $db_todo = mysqli_fetch_assoc($result);

        $todo = null;

        if ($db_todo) {
            $todo = new Todo($db_todo["title"], $db_todo["date"], $id);
        }

        return $todo;
    }

    public function update_todo(Todo $todo)
    {
        $query = "UPDATE todos SET title = ?, `date` = ? WHERE id = ?";

        $stmt = mysqli_prepare($this->conn, $query);

        $stmt->bind_param("ssi", $todo->title, $todo->date, $todo->id);

        $success = $stmt->execute();

        return $success;
    }

    public function delete_todo($id)
    {
        $query = "DELETE FROM todos WHERE id = ?";

        $stmt = mysqli_prepare($this->conn, $query);

        $stmt->bind_param("i", $id);

        $success = $stmt->execute();

        return $success;
    }

    public function register_user(User $user)
    {
        $query = "INSERT INTO users (username, passwordHash) VALUES (?, ?)";

        $stmt = mysqli_prepare($this->conn, $query);

        //We use get_password_hash() function for password because it returns our hashed password instead of what we entered
        $stmt->bind_param("ss", $user->username, $user->get_password_hash());

        $success = $stmt->execute();

        return $success;
    }
}
