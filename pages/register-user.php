<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register User</title>
    <link rel="stylesheet" href="/todo-assignment/assets/style.css">
</head>

<body>
    <h1>Register User</h1>

    <form action="/todo-assignment/scripts/post-register-user.php" method="POST">
        <input type="text" name="username" placeholder="Enter a username">
        <input type="password" name="password" placeholder="Enter a password">
        <input type="submit" value="Register">
    </form>

</body>

</html>