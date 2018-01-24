<!--
require_once="db/dp.php";
if (!empy($_GET))
{
    if(isset($_GET['msg']))
    {
        $str=$_GET['msg'];
        $messages="";    
    }
    
}
?>!-->
<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="./style.css">
    </head>
    <body>
        <div class="container">
        <h1>Welcome To my Chat app</h1>
            <div id="messageboard">
                <ul>
                    <div id="lines"></div>
                </ul>
            </div>
            <div id="message">
                <input type="text" id="msg" placeholder="Enter your message">
                <button id="sendBtn" onclick="sendMessage()">Send</button>
            </div>
        </div>
        <script>
            var msg="";
            function sendMessage()
            {
                msg = document.getElementById("msg").innerHTML;
                ajaxMessage(msg);
            }
            var getMessages = setInterval(ajaxMessage, 1000);
            function ajaxMessage(msg)
            {
               // alert();
                var xmlhttp = new XMLHttpRequest();
                    xmlhttp.onreadystatechange = function()
                    {
                        if (this.readyState == 4 && this.status == 200)
                        {
                            //alert(this.responseText);
                            document.getElementById("lines").innerHTML  = this.responseText;
                        }
                    };
                    xmlhttp.open("GET","messages.php?msg=" + msg,true);
                    xmlhttp.send();
            }
                
        </script>
    </body>
</html>
