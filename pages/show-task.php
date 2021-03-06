<?php
require_once __DIR__ . "/../classes/Database.php";

//need to get the users as well
require_once __DIR__ . "/../classes/User.php";

session_start();

$is_logged_in = (isset($_SESSION["logged_in"]) && $_SESSION["logged_in"]);

$user = $_SESSION["user"];

$db = new Database();

$id = $_GET["id"];

$todo = $db->get_task_by_id($id);

// dont show anyone elses loan
if (!$is_logged_in || $todo->user_id != $user->id) {
    //var_dump($todo);
    die("Not your todo");
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $todo->title ?></title>
    <link rel="stylesheet" href="/todo-assignment/assets/style.css">
</head>

<body>
    <div class="header">
        <h1>Single Task: <?= $todo->title ?></h1>
        <nav>
            <a href="/todo-assignment">Home</a>
            |
            <a href="/todo-assignment/pages/edit-task.php?id=<?= $id ?>">Edit task</a>
        </nav>
    </div>

    <p class="todo">
        <?= $todo ?>
    </p>


    <form class="form" action="/todo-assignment/scripts/delete-task.php" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input class="btn" type="submit" value="Delete todo">
    </form>

</body>

</html>