<?php
require_once __DIR__ . "/../classes/Database.php";

$db = new Database();

$id = $_GET["id"];

$todo = $db->get_task_by_id($id);

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

    <h1>Single Task: <?= $todo->title ?></h1>
    <nav>
        <a href="/todo-assignment">Home</a>
        <a href="/todo-assignment/pages/edit-task.php?id=<?= $id ?>">Edit task</a>
    </nav>

    <p>
        <?= $todo ?>
    </p>


    <form action="/todo-assignment/scripts/delete-task.php" method="POST">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="submit" value="Delete todo">
    </form>

</body>

</html>