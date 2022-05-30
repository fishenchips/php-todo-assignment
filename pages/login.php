<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="/todo-assignment/assets/style.css">
</head>

<body>
    <h1>Login</h1>

    <nav>
        <a href="/todo-assignment">Home</a>
    </nav>

    <form action="/todo-assignment/scripts/post-login.php" method="POST">
        <input type="text" name="username" placeholder="Your username">
        <input type="password" name="password" placeholder="Your password">
        <input type="submit" value="Login">
    </form>

</body>

</html>