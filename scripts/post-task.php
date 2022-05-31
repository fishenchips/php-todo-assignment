<?php

require_once __DIR__ . "./../classes/Database.php";
require_once __DIR__ . "./../classes/Todo.php";

//starting session to reach user->id
session_start();

$success = false;

if (isset($_POST["task"]) && isset($_POST["date"])) {
    $todo_task = $_POST["task"];
    $todo_date = $_POST["date"];
    $user = $_SESSION["user"];

    $todo = new Todo($todo_task, $todo_date, $user->id);

    $db = new Database();

    $success = $db->add_task($todo);
} else {
    echo "Invalid input";
}

if ($success) {
    header("Location: /todo-assignment");
} else {
    echo "Error adding task to DB";
}
