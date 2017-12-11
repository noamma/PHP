<?php
session_start();
if (!isset($_COOKIE['visit'])){
    $visit=1;
    echo "This is your first visit !";
    setcookie("visit", $visit, time()+3600, null,null,null,true);
    $_SESSION['visit']=$visit;
}
    else{
        //secure cookie blocks javaScript injection
        if (isset($_SESSION['visit'])){
            $visit = $_SESSION['visit'];
            echo "Session ".$visit." is still in process";
        }else{
            $visit=$_COOKIE['visit']+1;
            setcookie("visit", $visit, time()+3600, null,null,null,true);
            $_SESSION['visit']=$visit;
            echo "This is your ".$visit.", visit";
        }
    } 