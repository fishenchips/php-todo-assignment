<?php

require_once __DIR__ . "/../classes/Database.php";

if (isset($_POST["title"]) && isset($_POST["date"]) && $_POST["userId"] && $_POST["id"]) {
    $db = new Database();

    $todo = new Todo($_POST["title"], $_POST["date"], $_POST["userId"], $_POST["id"]);

    $success = $db->update_todo($todo);
} else {
    echo "Invalid input";
}

if ($success) {
    header("Location: /todo-assignment/pages/show-task.php?id=" . $_POST["id"]);
} else {
    echo "Error editing todo";
}
