<?
require_once('conf/header.php');

if (func::checkLoginState($dbh))
{
    //echo 'Welcome, ' . $_SESSION['username'] . ' !';

    ?>
    <div><span>Hello, <? $_SESSION['username'] ?> ! </span><a href="login.php">Logout</a></div>
    <?
} else
    {
    header("Location: login/login.php");
    exit();
    }

?>

