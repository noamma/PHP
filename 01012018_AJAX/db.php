<?
define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("DB", "phpdb");

$dbh = new PDO('mysql:host='.HOST.';dbname='.DB, USER, PASS);?>