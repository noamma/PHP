<?php
$users = array("noam"=>"noam1","test"=>"test1");
if(!empty($_GET['usr'])){
  if(array_key_exists($_GET['usr'],$users)){
    /*for(){
        
            }*/
            if ($users[$_GET['usr']]=$_GET['psd']){
                echo "Hello, ".$_GET['usr']."<br><br>You where succesfully authenticated!";
            }else{
                header('Refresh:3;url=../login.php');
                echo "authentication Faield!<br>Redirecting back to login page in 3 seconds";
            }
            
            
  }  else{
      header('Refresh:3;url=../login.php');
      echo "user ".$_GET['usr'].",  is not Authorized for login!<br>Redirecting back to login page in 3 seconds";
      exit();  
  }
    
   // print "Hello, ".$_GET['usr'];
}else{
    header('Refresh:3;url=../login.php');
    print "no user was submmited<br>Redirecting back to login page in 3 seconds";
    exit();
}
?>