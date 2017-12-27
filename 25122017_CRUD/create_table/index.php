<?php
require_once("../../class18122017_db1/db.php");

$sql  = "CREATE TABLE login(
    id INT(32) AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(32) NOT NULL,
    password VARCHAR(32) NOT NULL,
    email VARCHAR(32) NOT NULL,
    date TIMESTAMP)";

    if (mysqli_query($con, $sql)){
        echo "Table created Sucessfully";
    } else{
        echo " Error creating table: " . mysqli_error($con);
    }
    mysqli_close($con);
?>