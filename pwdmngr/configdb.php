<?php
$con = mysql_connect("your_server", "your_username", "your_password");

if (!$con)
    {
    exit("Error Occured");
    }

mysql_select_db("your_database", $con);
?>
