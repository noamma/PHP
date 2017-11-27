<?php
define("ITR",5,true);

function Encryption($input, $countdown=itr){
    if($countdown==0){
        return $input;
    }

 $crypt1 = crypt("$input","nm");
 $crypt2 = sha1($crypt1);
 $crypt3 = md5($crypt2);

 return Encryption($crypt3,--$countdown);
}
 echo Encryption("password123",itr);
?>