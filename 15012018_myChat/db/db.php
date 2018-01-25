<?
define("HOST", "mysql.hostinger.co.il");
define("USER", "u216147601_root");
define("PASS", "o7E2qkv1dHxI");
define("DB", "u216147601_chat");

$dbh = new PDO('mysql:host='.HOST.';port=3306;dbname='.DB, USER, PASS);
//$dbh = new PDO("mysql:host=localhost;dbname='u216147601_chat', 'u216147601_root', 'o7E2qkv1dHxI'"); 

/*define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("DB", "my_chat");

$dbh = new PDO('mysql:host='.HOST.';port=3306;dbname='.DB, USER, PASS);
*/
?>