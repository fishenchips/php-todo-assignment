<?php

require_once __DIR__ . "/../classes/Database.php";

$success = false;

if (isset($_POST["id"])) {

    $db = new Database();

    $success = $db->delete_todo($_POST["id"]);
} else {
    echo "Invalid input";
}

if ($success) {
    header("Location: /todo-assignment");
} else {
    echo "Error deleting contact";
}
