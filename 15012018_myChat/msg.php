<?
    require_once("db/db.php");
    $msg="";
    if(!empty($_GET))
    {
        if(isset($_GET['msg']) && isset($_GET['usr']))
        {
            if(!empty($_GET['msg']) && !empty($_GET['usr']))
            {
                $msg=$_GET['msg'];
                $usr=$_GET['usr'];
                echo $usr;
                $qry="INSERT INTO `messages` (`id`, `UserName`, `message`, `time`) VALUES (NULL, '".$usr."', '".$msg."', NULL);";
                $stmt = $dbh->prepare($qry);
                $stmt->execute();
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