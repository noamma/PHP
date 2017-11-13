<?php /*
header('location://google.com'); //imidiate redirect*/
header('Refresh: 3;url=//google.com');
echo "Redirecting to google in 3 Seconds.";
exit();
?>