<!DOCTYPE html>
<html>
<head>
<title>Hello PHP</title>
<style>h1{
    color: white;
    text-shadow: 2px 2px 4px #000;
    text-align:center;}
    </style>
    </head>
    <body>
    <h1><?php print "hello World"; ?> </h1>
    <h3>
    <?php 
    $txt = "&#161Hola mundo!";
    $x = 7;
    $y = 11.7;

    echo $txt;
    echo "<br>";
    echo $x;
    echo "<br>";
    echo $y;
    echo $txt."<br>".$x."<br>".$y."<br>";
    /*casting types
    $flag = tru;
    $flag = (boolean) true;
    $flag = (boolean) "1";
    $flag = (boolean) 1;

    $n = 7;
    $n = (integer) 7;
    $n = (integer) "7";
    */
    if (is_string($txt))
    {
     echo "Yes";   
    } else
    {
        echo "No";
    }
    echo "<br>";
    echo (is_int($y) ? "Yes" : "No");
    echo "<br>";
    $employees = array("Alex", "Doron", "Yaron");
    foreach($employees as $e){
        sleep(rand(1,5));
        $$e = date('l')." ".date('d/m/y')."&emsp;"
        .$e." started at &emsp;".date('H:i:s');
    }
    echo $Alex."<br>";
    echo $Doron."<br>";
    echo $Yaron."<br>";
    ?></h3>
    </body>
</html>