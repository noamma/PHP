<?php
$visit = 1;
$date = new DateTime(time(), new DateTimeZone('Asia/Jerusalem'));
$date->setTimeZone(new DateTimeZone('Asia/Jerusalem'));
echo $date->format("l, d/m/Y,  H:i:s")."\n";
echo "<br><br>";
//creating a cookie

//setcookie("visit", $visit, time()+3600);

//deleting a cookie

//setcookie("visit", "", time()-3600);

if (!isset($_COOKIE['visit'])){
    echo "This is your first visit !";
    setcookie("visit", $visit, time()+3600, null,null,true);
}
    else{
        //secure cookie blocks javaScript injection
        setcookie("visit", $visit, time()+3600, null,null,true);
        echo "This is your ".$_COOKIE['visit'].", visit";
    } 
?>