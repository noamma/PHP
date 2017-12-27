<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
<fieldset><br>
<h2>Preferable Day</h2>
<fieldset>
<legend>Choose one or more options</legend>
<input type="checkbox" name="days[]" value="sunday"> Sunday
<input type="checkbox" name="days[]" value="monday"> Monday
<input type="checkbox" name="days[]" value="tuesday"> Tuesday
<input type="checkbox" name="days[]" value="wednesday"> Wednesday
<input type="checkbox" name="days[]" value="thursday"> Thursday
<input type="checkbox" name="days[]" value="friday"> Friday
</fieldset><br>
<input type="submit" value="הרשם">
</fieldset><br>
<?php
if(!empty($_GET)){
$days = $_GET['days'];
$N = count($days);
echo("You selected $N day(s): ");
for($i=0; $i < $N; $i++){
    echo($days[$i] . " ");
}
}
?>
</form> 
</body>
</html>
