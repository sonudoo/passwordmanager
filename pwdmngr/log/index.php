<?php
$file = fopen("log.txt","a");
$date=date("l dS \of F Y h:i:s A");
$ip=$_SERVER['REMOTE_ADDR'];
$nt="";
fwrite($file,"\r\n".$date." IP Address ".$ip." Accessed log file ".$nt );
fclose($file);
header ('location:log.txt');
?>