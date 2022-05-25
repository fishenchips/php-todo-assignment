<?php

require_once __DIR__ . "./../classes/Database.php";
require_once __DIR__ . "./../classes/Todo.php";

$success = false;

if (isset($_POST["task"]) && isset($_POST["date"])) {
    $todo_task = $_POST["task"];
    $todo_date = $_POST["date"];

    $todo = new Todo($todo_task, $todo_date);

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
