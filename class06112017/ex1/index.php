<?php
$colors = array("red", "green", "orange", "skyblue", "pink");
$mycolor=$colors[rand(0, count($colors)-1)];
?>
<DOCTYPE html>
<html>
<head>
<title>Hellow World</title>
<?php
echo "<style>";
echo "body{";
echo "background-color:".$mycolor;
echo "}</style>";
?>
</head>
<body>
<h1>Hello World</h1>
</body>
</html>