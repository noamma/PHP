<?php
define("HOST", "localhost");
define("USER", "root");
define("PASS", "");

$con = mysqli_connect(HOST, USER, PASS);
$sql = "CREATE DATABASE mydata";

if (mysqli_query($con, $sql))
{
    echo "Database created successfully";
}
else
{
    "Error creating databse: " . mysqli_error($con);
}
mysqli_close($con);
?>