<?php
//http://localhost/todo-assignment/
require_once __DIR__ . "/classes/Database.php";

$db = new Database;

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

    <?php
    var_dump($db);
    ?>
</body>

</html>