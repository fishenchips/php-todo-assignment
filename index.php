<?php
//http://localhost/todo-assignment/
require_once __DIR__ . "/classes/Database.php";
require_once __DIR__ . "/classes/Todo.php";


$db = new Database();

$todos = $db->get_tasks();

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
    <h1>Todos</h1>

    <nav>
        <a href="/todo-assignment/pages/create-task.php">Create task</a>
    </nav>

    <hr>

    <?php foreach ($todos as $todo) : ?>
        <p>
            <a href="/todo-assignment/pages/show-task.php?id=<?= $todo->id ?>">
                <?= $todo ?>
            </a>
        </p>
    <?php endforeach ?>

</body>

</html>