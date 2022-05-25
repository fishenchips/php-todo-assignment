<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Task</title>
    <link rel="stylesheet" href="/todo-assignment/assets/style.css">
</head>

<body>
    <h1>Create Task</h1>

    <nav>
        <a href="/todo-assignment">Home</a>
    </nav>

    <form action="/todo-assignment/scripts/post-task.php" method="POST">
        <input type="text" name="task" placeholder="Enter task">
        <input type="date" name="date" placeholder="Enter date">
        <input type="submit" value="Add task">
    </form>
</body>

</html>