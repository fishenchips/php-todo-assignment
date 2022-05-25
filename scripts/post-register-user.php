<?php

require_once __DIR__ . "/../classes/Database.php";
require_once __DIR__ . "/../classes/User.php";


$success = false;

if (isset($_POST["username"]) && isset($_POST["password"])) {

    $db = new Database();

    //id will be added in DB
    $user = new User($_POST["username"]);

    //below to create the hashed password and that will be stored in DB
    $user->hash_password($_POST["password"]);

    $success = $db->register_user($user);
} else {
    echo "Invalid input, cannot save user";
    die();
}

if ($success) {
    header("Location: /todo-assignment");
} else {
    echo "Error saving user to DB";
    die();
}
