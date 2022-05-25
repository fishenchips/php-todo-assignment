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
    <title>TASK SINGLE</title>
    <link rel="stylesheet" href="/todo-assignment/assets/style.css">
</head>

<body>

    <h1>Single Task</h1>
    <nav>
        <a href="/todo-assignment">Home</a>
    </nav>

    <p>
        <?= $todo ?>
    </p>

</body>

</html>