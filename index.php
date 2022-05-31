<?php
//http://localhost/todo-assignment/
require_once __DIR__ . "/classes/Database.php";
require_once __DIR__ . "/classes/Todo.php";
require_once __DIR__ . "/classes/User.php";

//Include Google Configuration File
require_once __DIR__ . "/google-config.php";

$google_login_btn = '<a href="' . $google_client->createAuthUrl() . '">Login with Google</a>';

//session_start(); --> NOT NEEDED ANYMORE BECAUSE its is included in google-config.php

$db = new Database();

$is_logged_in = (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]);

$user = $_SESSION["user"];

//only run this function if $is_logged_in
if ($is_logged_in) {
    $user_todos = $db->get_tasks_by_user_id($user->id);
}

$all_todos = $db->get_tasks();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start Page - Todos</title>
    <link rel="stylesheet" href="/todo-assignment/assets/style.css">
</head>

<body>
    <?php if ($is_logged_in) : ?>
        <div class="header">
            <h1>Stop Slacking - These are your Todos</h1>
            <p>
                Welcome back,
                <b>
                    <?= $_SESSION["user"]->username ?>
                </b>
            </p>

            <form action="/todo-assignment/scripts/post-logout.php" method="POST">
                <input class="btn" type="submit" value="Logout">
            </form>
        </div>



    <?php else : ?>
        <div class="header">
            <h1>Welcome to Todo.com</h1>
            <h2>Keep track of your chores for a better life style!</h2>
        </div>
    <?php endif ?>

    <nav class="navbar">
        <?php if ($is_logged_in) : ?>
            <a href="/todo-assignment/pages/create-task.php">Create task</a>

        <?php else : ?>

            <a href="/todo-assignment/pages/register-user.php">Register</a>
            <a href="/todo-assignment/pages/login.php">Login</a>
            <?= $google_login_btn ?>

        <?php endif ?>
    </nav>
    <div class="todo">
        <?php if ($is_logged_in) : ?>
            <?php foreach ($user_todos as $todo) : ?>
                <p>
                    <a href="/todo-assignment/pages/show-task.php?id=<?= $todo["id"] ?>">
                        <b>
                            <?= $todo["title"] ?>
                        </b>
                        to be done: <?= $todo["date"] ?>
                    </a>
                </p>

            <?php endforeach ?>
        <?php endif ?>
    </div>
</body>

</html>