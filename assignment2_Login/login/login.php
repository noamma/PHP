<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="login.css">
    <title>Login to session</title>
</head>
<body>
    <form action="../index.php" method="POST">
        <div class="imgcontainer">
            <img src="img_avatar2.png" alt="Avatar" class="avatar">
        </div>

        <div class="container">
            <lable><b>Username</b></lable>
            <input type="text" placeholder="Enter Username" name="usr" required autofoucus>
            <lable><b>Password</b></lable>
            <input type="password" placeholder="Enter Password" name="pswd" required>

            <button type="submit">Login</button>
        </div>
    </form>
</body>
</html>