<?php
//http://localhost/todo-assignment/
require_once __DIR__ . "/classes/Database.php";
require_once __DIR__ . "/classes/Todo.php";
require_once __DIR__ . "/classes/User.php";

session_start();

$db = new Database();

$todos = $db->get_tasks();

$is_logged_in = (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]);

var_dump($is_logged_in);

var_dump($todos);

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
        <h1>Stop Slacking - These are your Todos</h1>

    <?php else : ?>
        <h1>Welcome to Todo.com - Keep track of your chores for a better life style!</h1>
    <?php endif ?>

    <nav>
        <?php if ($is_logged_in) : ?>
            <a href="/todo-assignment/pages/create-task.php">Create task</a>

        <?php else : ?>

            <a href="/todo-assignment/pages/register-user.php">Register</a>
            <a href="/todo-assignment/pages/login.php">Login</a>

        <?php endif ?>
    </nav>

    <hr>

    <?php if ($is_logged_in) : ?>

        <p>
            Welcome back,
            <b>
                <?= $_SESSION["user"]->username ?>
            </b>
        </p>

        <?php foreach ($todos as $todo) : ?>
            <p>
                <a href="/todo-assignment/pages/show-task.php?id=<?= $todo->id ?>">
                    <?= $todo ?>
                </a>
            </p>
        <?php endforeach ?>

        <form action="/todo-assignment/scripts/post-logout.php" method="POST">
            <input type="submit" value="Logout">
        </form>

    <?php endif ?>



</body>

</html>