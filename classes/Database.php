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
        $query = "INSERT INTO todos (title, `date`, userId) VALUES (?, ?, ?)";

        $stmt = mysqli_prepare($this->conn, $query);

        //try to keep date as a string
        $stmt->bind_param("ssi", $todo->title, $todo->date, $todo->user_id);

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

            $user_id = $db_todo["userId"];

            //need to add to the array so dont forget []
            $todos[] = new Todo($title, $date, $user_id, $id);
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
            $todo = new Todo($db_todo["title"], $db_todo["date"], $db_todo["userId"], $id);
        }

        return $todo;
    }

    public function update_todo(Todo $todo)
    {
        $query = "UPDATE todos SET title = ?, `date` = ?, userId = ? WHERE id = ?";

        $stmt = mysqli_prepare($this->conn, $query);

        $stmt->bind_param("ssii", $todo->title, $todo->date, $todo->user_id, $todo->id);

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

    public function get_user_by_username($username)
    {
        $query = "SELECT * FROM users WHERE username = ?";

        $stmt = mysqli_prepare($this->conn, $query);

        $stmt->bind_param("s", $username);

        $stmt->execute();

        $result = $stmt->get_result();

        //make result into an associative array before using
        $db_user = mysqli_fetch_assoc($result);

        $user = null;
        if ($db_user) {

            $user = new User($username, $db_user["id"]);

            //setting passwrod to whats in the DB
            $user->set_password_hash($db_user["passwordHash"]);
        }

        return $user;
    }

    public function get_tasks_by_user_id($user_id)
    {
        $query = "SELECT * FROM todos WHERE userId = ?";

        $stmt = mysqli_prepare($this->conn, $query);

        $stmt->bind_param("i", $user_id);

        $stmt->execute();

        $result = $stmt->get_result();

        //fetch all todos for the user
        $todos = mysqli_fetch_all($result, MYSQLI_ASSOC);

        return $todos;
    }
}
