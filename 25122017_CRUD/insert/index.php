<?php
require_once("../../class18122017_db1/db.php");

$sql = "INSERT INTO login (id, username, password, email, date)
        VALUES (null, 'noamma', md5('12345'), 'noamma@nvgnet.co.il',null)";
        //"INSERT INTO login VALUES (null, 'noamma', md5('12345'), 'noamma@nvgnet.co.il',null)";
        
        if (mysqli_query($con, $sql)){
            echo "New User created successfully";
        }else{
            echo "Error: " . mysqli_error($con);
        }
        mysqli_close($con);
?>