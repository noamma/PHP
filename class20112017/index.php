<?php
if(!empty($_GET)){
    if(isset($_GET["mynumber"])){
        $number=$_GET["number"];
        $mynumber=$_GET["mynumber"];
        $turn=$_GET["turn"];
        if ($number==$mynumber){
            echo "<p>Correct !<br>you have gussed the number in ".$turn." turns</p>";
            exit();
        }else{
            $turn=$turn+1;
        }
       // echo "myNumber is: ".$_GET["mynumber"];
         
    }
}else{
    $number = mt_rand(1,100);
    $turn=1;
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Guss a Number Game!</title>
<link rel="stylesheet" type="text/css" href="css/index.css">
</head>
<body>
<form action="<?php echo $_SERVER["PHP_SELF"]?>" method="GET">
<legend>Guss a number Between 1 to 100</legend>
<fieldset>
<input type="text" placeholder="enter a number" name="mynumber" autofocus>
<input type="hidden" name="number" value="<?php echo $number ?>">
<input type="hidden" name="turn" value="<?php echo $turn ?>">
<input type="submit" name="submit">
</fieldset>
</form>
</body>
</html>