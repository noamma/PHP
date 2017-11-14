<!DOCTYPE html>
<html>
    <head>
    <link rel="stylesheet" type="text/css" href="css/authenticate.css">
</head>
<body>
<?php
$users = array("noam"=>"noam1","test"=>"test1");
$redstring = "<p class='redirect'> Redirecting back to login page in";
$redstring .= "<span id='counter'> 3 </span>seconds<p>";

if(!empty($_POST['usr'])){
  if(array_key_exists($_POST['usr'],$users)){
    /*for(){
        
            }*/
            if ($users[$_POST['usr']]=$_POST['psd']){
                echo "Hello, ".$_POST['usr']."<br><br>You where succesfully authenticated!";
            }else{
                header('Refresh:3;url=../login.php');
                echo "authentication Faield!<br>".$redstring;
            }
            
            
  }  else{
      header('Refresh:3;url=../login.php');
      echo "user ".$_POST['usr'].",  is not Authorized for login!<br>Redirecting back to login page in 3 seconds";
      exit();  
  }
    
   // print "Hello, ".$_POST['usr'];
}else{
    header('Refresh:3;url=../login.php');
    print "no user was submmited<br>Redirecting back to login page in 3 seconds";
    exit();
}
?>
</body>
</html>