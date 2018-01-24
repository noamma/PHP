<?
require_once('db.php');
if(!empty($_GET))
{
    if(isset($_GET['q']))
    {
        $str=$_GET['q'];
        $hint = "";
        if($str!== "")
        {
            $stmt = new pdo('mysql:host='.HOST.';dbname='.DB, USER, PASS);
            $qry = "SELECT * FROM countries WHERE countryname LIKE '%' :str '%'";
            $stmt = $dbh->prepare($qry);
            $stmt->execute(array(':str' => $str));
            $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
            foreach($rows as $row)
            {
                $country = $row['countryname'];
                $hint.= "<div> <lable>$country</lable><img src='img/$country.png'></div>" ;
            }
            echo $hint === "" ? "no resoult" : $hint;
            exit();
        }
    }
}
?>

<form>
    <fieldset>
        <input type="search" name="keyword" onkeyup="ajaxHint(this.value)" placeholder="looking for" autofocus>
        <div id="options"></div>
    </fieldset>
</form>
<script>
/*
var req = new XMLHttpRequest();
req.open('POST', 'example.php',true); // req.open('POST', 'example.php');
req.setRequestHeader
req.sent();*/
function ajaxHint(str)
{
    if (str.length == 0)
    {
        document.getElementById("options").innerHTML = "";
        return;
    } else
    {
        var xmlhttp = new XMLHttpRequest();
        xmlhttp.onreadystatechange = function()
        {
            if (this.readyState == 4 && this.status == 200)
            {
                document.getElementById("options").innerHTML = this.responseText;
            }
        };
        xmlhttp.open("GET", "<? echo $_SERVER['PHP_SELF'].'?q=' ?>" +  str,true);
        xmlhttp.send();
    }
}
</script>
