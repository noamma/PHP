<?
    require_once("../conf/header.php");
    /*if(empty($_SERVER["HTTPS"]) || $_SERVER["HTTPS"] !== "on")
    {
    header("Location: https://" . $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]);
    exit();
    }*/
    if(!func::checkLoginState($dbh))
    {
        if(isset($_POST['usr']) && isset($_POST['pswd']))
        {   
            $query = "SELECT * FROM users WHERE user_username = :usr AND user_password = :pswd";

            $usr = $_POST['usr'];
            $pswd = md5($_POST['pswd']);

            $stmt = $dbh->prepare($query);
            $stmt->execute(array(':usr' => $usr, ':pswd' => $pswd));

            $row = $stmt->fetch(PDO::FETCH_ASSOC);

            if($row['user_id']>0)
            {
            func::createRecord($dbh,$row['user_id'], $row['user_username']);
            //header("location:../index.php");
            //exit();
                echo func::createString(32);
            }
            else{
                echo "login error";
            }
        }
        else
        {
            ?>
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
                    <form action="" method="POST">
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
            </html><?
        }
    }
    else
    {
        header("location:../index.php");
        exit();
    }
?>