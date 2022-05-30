<?php

session_start();

require_once __DIR__ . "/../classes/Database.php";

$success = false;

if (isset($_POST["username"]) && isset($_POST["password"])) {

    $db = new Database();

    $user = $db->get_user_by_username($_POST["username"]);

    if ($user) {
        //returns true/false so entering the right password as in DB will log us in.
        $success = $user->test_password($_POST["password"]);

        //will be stored in order to stay logged in
        if ($success) {
            $_SESSION["logged_in"] = true;
            $_SESSION["user"] = $user;
        }
    }
} else {
    echo "Invalid input";
    var_dump($_POST);
    die();
}

if ($success) {
    header("Location: /todo-assignment");
} else {
    echo "Login Failed";
}
