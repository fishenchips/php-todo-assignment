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
    <title>Edit task</title>
    <link rel="stylesheet" href="/todo-assignment/assets/style.css">
</head>

<body>
    <div class="header">
        <h1>Edit task</h1>

        <nav>
            <a href="/todo-assignment">Home</a>
            |
            <a href="/todo-assignment/pages/show-task.php?id=<?= $id ?>">Back to task</a>
        </nav>
    </div>

    <form class="form" action="/todo-assignment/scripts/post-edit-task.php" method="POST">
        <input class="input" type="text" name="title" placeholder="Edit task" value="<?= $todo->title ?>">
        <input class="input" type="date" name="date" placeholder="edit date" value="<?= $todo->date ?>">
        <input type="hidden" name="userId" value="<?= $todo->user_id ?>">
        <input type="hidden" name="id" value="<?= $todo->id ?>">
        <input class="btn" type="submit" value="Edit task">
    </form>

</body>

</html>