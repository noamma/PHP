<?php

$salaries = array("daniel" => 13000,
"nir" => 8950,
3000,
5000,
"noa" => 'Ten Thousand');

echo "Daniel's salary is ".$salaries['daniel']."<br>";
echo "Nir's salary is ".$salaries['nir']."<br>";
echo "Noa's salary is ".$salaries['noa']."<br>";

print_r($salaries);
/* Array([daniel]=> 1300[nir]=>8950[0]=>3000[1]=>5000[noa]=>Ten Thousand)*/
echo "<br><br>";
foreach($salaries as $key=>$value){
    echo $key," => ", $value, "<br>";
}
echo "<br><br>";

$keys = array_keys($salaries);
print_r($salaries);
print "<br>";
print_r($keys);

echo "<br><br>";

if (array_key_exists("nir", $salaries))
{
    echo "Nir's salary is ".$salaries['nir']."<br>";
}
?>