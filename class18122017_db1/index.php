<?php
//include 'db.php';
require 'db.php';
$sql = "select * from users";
$res = mysqli_query($con, $sql);

while($row = mysqli_fetch_array($res)){
    echo "<h2>Username: ".$row[1]."&emsp;Password: ".$row[2]."</h2>";
}

mysqli_close($con);

?>