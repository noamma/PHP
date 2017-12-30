<?
define("HOST", "localhost");
define("USER", "root");
define("PASS", "");
define("DB", "securelogin");

$dbh = new PDO('mysql:host='.HOST.';dbname='.DB, USER, PASS);

$stmt = $dbh->prepare("SELECT * FROM users;");
$stmt->execute();

$rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

/*foreach($rows as $row)
{
    echo$row['user_username'];
}*/
?>