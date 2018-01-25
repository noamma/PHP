<?
if(!empty($_SESSION) || isset($_SESSION['username']) || isset($_COOKIE['PHPSESSID']))
{
    session_start();
    $username=$_SESSION['username'];
    //echo $username;
    ?>
        <!DOCTYPE html>
        <html>
        <head>
            <link rel="stylesheet" type="text/css" href="./style.css">
        </head>
        <body>
            <div class="container">
                <h1>Hello <?echo $username;?>, Welcome To my Chat app</h1>
                <div id="messageboard">
                <ul>
                    <div id="lines"></div>
                </ul>
                </div>
                <div id="message">
                    <input type="text" id="msgtxt" placeholder="Enter your message">
                    <button id="sendBtn" onclick="sendMessage()">Send</button>
                </div>
            </div>
            <script>
                msg="";
                username = "<?echo $username?>";
                function sendMessage()
                {
                    msg = document.getElementById("msgtxt").value;
                    document.getElementById("msgtxt").value="";
                    ajaxMessage(msg);
                    //alert(msg);
                }
            
                getMessages = setInterval(ajaxMessage, 1000, msg);
            
                function ajaxMessage(msg)
                {
                    var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function()
                    {
                        if (this.readyState == 4 && this.status == 200)
                        {
                            //alert(this.responseText);
                            document.getElementById("lines").innerHTML  = this.responseText;
                        }
                    };
                    
                    //alert("<?echo $username?>");
                    xmlhttp.open("GET","./msg.php?usr=" + window.username + "&msg=" + msg,true);
                    xmlhttp.send();
                } 
            </script>
        </body>
        </html>
    <?
} else
{
    if(empty($_GET))
    {
        ?>
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <meta http-equiv="X-UA-Compatible" content="ie=edge">
            <title>My chat login page</title>
        </head>
        <body>
            <div id="container">
                <form action="" method="GET">
                    <h1>Please choose login name</h1>
                    <fieldset>
                        <input type="text" id="logintxt" name = "username" placeholder="Enter login name" oninput= "ajaxCheckUser(this.value)" autofocus>
                        <span id="loginname"></span>
                    </fieldset>
                <form>
            </div>
            <script>
                function ajaxCheckUser(str)
                {
                    if (str.length == 0)
                    {
                        document.getElementById("loginname").innerHTML = "";
                        return;
                    } else
                    {
                        //alert(str);
                        var xmlhttp = new XMLHttpRequest();
                        xmlhttp.onreadystatechange = function()
                        {
                            if (this.readyState == 4 && this.status == 200)
                            {
                                //alert(this.responseText);
                                document.getElementById("loginname").innerHTML = this.responseText;
                            }
                        };
                        xmlhttp.open("GET", "<? echo $_SERVER['PHP_SELF'].'?q=' ?>" +  str,true);
                        xmlhttp.send();
                    }
                }
            </script>
        </body>
        </html>
        <?
    }else
    {
        if(isset($_GET['q']) && (!empty($_GET['q'])))
        {
            require_once('db/db.php');
            $str = $_GET['q'];
            $valid="";
            $stmt = new pdo('mysql:host='.HOST.';dbname='.DB, USER, PASS);
            $qry = "SELECT * FROM messages WHERE UserName = '".$str."'";
            $stmt = $dbh->prepare($qry);
            $result= $stmt->execute();
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $count= $stmt->rowCount();
            if ($count>0)
            {
                $valid= "<lable style='background-color: red;'>User already in use</lable>" ;
            }else
            {
                $valid= "<lable style='background-color: hsl(120, 100%, 75%);'>User available !</lable><input type='submit' value='Send'>" ;
            }
           /* 
            echo $count;
            foreach($rows as $row)
            {
                $user = $row['UserName'];
                $valid.= "<div> <lable>$user</lable></div>" ;
            }*/
            echo $valid;
            exit();
        }
        if(isset($_GET['username']) && (!empty($_GET['username'])))
        {
            session_start();
            $_SESSION['username']=$_GET['username'];
            header("Refresh:0");
        }
    }
}
?>