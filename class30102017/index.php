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
    <h3>Today is <?php echo date("l");?></h3>
    <h3>The date is:&nbsp;<?php echo date("d/m/Y"); ?></h3>
    <h3>The time is:&nbsp;<?php echo date("H:i:s");?></h3>
    </body>
</html>