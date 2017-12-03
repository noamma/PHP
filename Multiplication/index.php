<?php
if(!empty($_GET)){
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    $result = $_GET['result'];
    $myanswer = $_GET['myanswer'];
    $points = $_GET['points'];
    $turn = $_GET['turn']+1;
    if ($result == $myanswer){
        $points += 20;    
    }
    if ($turn==6){
        $msg = "Your Score is: $points";
        $question = "";
        $btn = "<form action=";
        $btn.= "\"<?php echo $_SERVER['PHP_SELF']?>\"";
        $btn.=" method=\"GET\">";
        $btn.=" <br> <input type=\"reset\" value=\"New Game\" > <br> </form>";
    }else{
    $msg="Points: $points <br> Turn: $turn <br>";
    $question = $num1." * ".$num2." = ";
}
}else{
    $result = 0;
    $points = 0;
    $turn = 1;
    $msg="Welcome to Multiplication Fun !<br>";
    $question = $num1." * ".$num2." = ";    
}
$num1 = mt_rand(3, 10);
$num2 = mt_rand(3, 10);
$result = $num1 * $num2;
?>
<!DOCTYPE htm>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/index.css">
<title>Multiplication Game</title>
</head>
<body>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">
<h2><?php echo $msg ?><h2>
<?php echo $question ?>
<fieldset>
<input type="hidden" name="num1" value=<?php echo $num1?>>
<input type="hidden" name= "num2" value=<?php echo $num2?>>
<input type="hidden" name= "result" value=<?php echo $result?>>
<input type="hidden" name= "points"  value=<?php echo $points?>>
<input type="hidden" name= "turn"  value=<?php echo $turn?>>
<input type="text" placeholder="answer" name="myanswer">
<?php echo $btn?>
</fieldset>
</form>
</body>
</html>
<?php
function drawBoard(){

}
?>