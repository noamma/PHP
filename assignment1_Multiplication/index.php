<?php
define("NEW_GAME",0);
define("GAME_ON",1);
define("END_GAME",2);
define("WRITE", "Correct answer !");
define("WRONG", "Wrong answer...");
define("ITR",5);

$panel_state;
$content_state;

function Encryption($input, $countdown=ITR){
    if($countdown==0){
        return $input;
    }
    $crypt1 = crypt("$input","nm");
    $crypt2 = sha1($crypt1);
    $crypt3 = md5($crypt2);
 return Encryption($crypt3,--$countdown);
}
function getQuery(){
    
    global $num1, $num2, $result;
    $num1 = mt_rand(3, 10);
    $num2 = mt_rand(3, 10);
    $question = $num1." * ".$num2." = ";
    $result = $num1*$num2;
    return $question;
}
function drawPanel($panel_state){
    global $turn, $points, $ans;
    switch($panel_state){
        case NEW_GAME: 
        ?>
        <h2>Welcome to multiplication game</h2>
        <?php
        break;
        case GAME_ON:
        ?>
        <h2><?php echo $ans?><br>Points: <?php echo $points?> <br> Turn: <?php echo $turn?> <br></h2>
        <?php
        break;
        case END_GAME:
        ?>
        <h2><?php echo $ans?><br></h2>
        <?php
        break;
    }
}

function drawContent($content_state){
    global $num1, $num2, $result, $turn, $points, $ans;
    switch($content_state){
        case GAME_ON:
        echo "<h3>".getQuery()."<br></h3>";
        ?>
        <input type="hidden" name="num1" value=<?php echo $num1?>>
        <input type="hidden" name= "num2" value=<?php echo $num2?>>
        <input type="hidden" name= "result" value=<?php echo Encryption($result,ITR)?>>
        <input type="hidden" name= "points"  value=<?php echo $points?>>
        <input type="hidden" name= "turn"  value=<?php echo $turn?>>
        <input type="hidden" name="ans" value=<?php echo $ans?>>
        <input type="text" placeholder="answer" name="myanswer" autofocus>
        <input type="submit">
        <?php
        break;
        case END_GAME:
            ?>
            <h2>Your Score is: <?php echo $points?></h2>
            <form action="<?php echo $_SERVER['PHP_SELF'];?>" method="GET">
                <input type="submit" value="new Session">
            </form>
            <?php
        break;
    }
}

function newSession(){
    global $result, $points, $turn;
    $result = 0;
    $points = 0;
    $turn = 1;
    $panel_state=NEW_GAME;
    $content_state=GAME_ON;
    drawBoard($panel_state, $content_state);
}
if(!empty($_GET)){
    $num1 = $_GET['num1'];
    $num2 = $_GET['num2'];
    $result = $_GET['result'];
    $myanswer = $_GET['myanswer'];
    $points = $_GET['points'];
    $turn = $_GET['turn']+1;
    $ans = $_GET['ans'];
    if ($result == Encryption($myanswer,ITR)){
        $points += 20;
        $ans=WRITE;    
    }else{
        $ans=WRONG;
    }

    if ($turn==6){
        $panel_state=END_GAME;
        $content_state=END_GAME;
        }else{
            $panel_state=GAME_ON;
            $content_state=GAME_ON;
            }
        drawBoard($content_state,$panel_state);
}else{
    newSession();    
    }

?>
<!DOCTYPE htm>
<html>
<head>
<link rel="stylesheet" type="text/css" href="css/index.css">
<title>Multiplication Game</title>
</head>
<body>
<?php
function drawBoard($panel_state, $content_state){
?>
<form action="<?php echo $_SERVER['PHP_SELF']?>" method="GET">
<fieldset><?php
drawPanel($panel_state);
?>
<hr><br>
<?php
drawContent($content_state);
?>
</fieldset>
</form>
</body>
</html><?php
}
?>