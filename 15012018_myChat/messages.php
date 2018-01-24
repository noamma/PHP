<?
    require_once("db/db.php");
    $msg="";
    if(!empty($_GET))
    {
        if(isset($_GET['msg']))
        {
            if(!empty($_GET['msg']))
            {
                $msg=$_GET['msg'];
                $qry="INSERT INTO `messages` (`id`, `UserName`, `message`, `time`) VALUES (NULL, 'noamma', $msg, NULL);";
                $stmt = $dbh->prepare($qry);
                $stmt->execute(array(':msg' => $msg));
            }
        }
    }
    $qry= "SELECT * FROM messages ORDER BY time DESC";
    $stmt = $dbh->prepare($qry);
    $stmt->execute();
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
    foreach($rows as $row)
    {
        $msg.="<li>".$row['UserName'].": ".$row['message']."</li>";
    }
    echo $msg;
?>