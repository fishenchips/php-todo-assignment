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
    <div class="header">
        <h1>Register User</h1>

        <nav>
            <a href="/todo-assignment">Home</a>
        </nav>
    </div>
    <form class="form" action="/todo-assignment/scripts/post-register-user.php" method="POST">
        <input class="input" type="text" name="username" placeholder="Enter a username">
        <input class="input" type="password" name="password" placeholder="Enter a password">
        <input class="btn" type="submit" value="Register">
    </form>

</body>

</html>