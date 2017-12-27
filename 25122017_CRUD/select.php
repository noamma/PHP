<?php
require_once("../../class18122017_db1/db.php");

$sql = "SELECT username, password AS pass FROM login WHERE username LIKE '%noam%'"; //LIMIT 3 OFFSET 5

$res = mysqli_query($con, $sql);

echo "<table><th>"
while($row = mysqli_fetch_assoc($res)){

}
?>