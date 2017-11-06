<?php
if (!empty($_GET['usernanme']))
{
print "Hello, ".$_GET['username'];
}
else{
    print "<br>You forgot to write your name</br>";
}
?>