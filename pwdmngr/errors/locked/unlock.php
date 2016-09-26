<?php
$file = fopen("../../log/log.txt", "a");
$date = date("l dS \of F Y h:i:s A");
$ip = $_SERVER['REMOTE_ADDR'];
$nt = "";
fwrite($file, "\r\n" . $date . " IP Address " . $ip . " Accessed Password Manager unlock page " . $nt);
fclose($file);
include "../../configdb.php";

$result = mysql_query("SELECT * FROM status");

while ($row = mysql_fetch_array($result))
  {
  $status = $row['status'];
  }

if ($status == 'unlocked')
  {
  $sql1 = "SELECT * FROM unlockednow";
  $result1 = mysql_query($sql1);
  $count1 = mysql_num_rows($result1);
  if ($count1 > 0)
    {
    mysql_query("UPDATE unlockednow SET unlockednow='unlockednow'");
    }
    else
    {
    mysql_query("INSERT INTO unlockednow (unlockednow) VALUES ('unlockednow')");
    }

  mysql_query("UPDATE status SET status='unlocked'");
  setcookie("nomoretrytounlock", "", time() - 3600, "/");
  setcookie("mailedtounlock", "", time() - 3600, "/");
  setcookie("unlockednow", "unlockednow", time() + 300, "/");
  session_start();
  session_destroy();
  setcookie("PHPSESSID", "", time() - 300, "/");
  $file = fopen("../../log/log.txt", "a");
  $date = date("l dS \of F Y h:i:s A");
  $ip = $_SERVER['REMOTE_ADDR'];
  $nt = "";
  fwrite($file, "\r\n" . $date . " IP Address " . $ip . " Password Manager is already unlocked Redirected to destroy cookies " . $nt);
  fclose($file);
  header('location: ../../webscr/destroycookies');
  }
  else
  {
  }

mysql_close($con);
?><?php

if (isset($_COOKIE['nomoretrytounlock']))
  {
  $file = fopen("../../log/log.txt", "a");
  $date = date("l dS \of F Y h:i:s A");
  $ip = $_SERVER['REMOTE_ADDR'];
  $nt = "";
  fwrite($file, "\r\n" . $date . " IP Address " . $ip . " nomoretrytounlock cookie set Redirected " . $nt);
  fclose($file);
  header('Location: index.php?try=1');
  }
  else
  {
  if (isset($_COOKIE['try']) && $_COOKIE['try'] > 3)
    {
    $file = fopen("../../log/log.txt", "a");
    $date = date("l dS \of F Y h:i:s A");
    $ip = $_SERVER['REMOTE_ADDR'];
    $nt = "";
    fwrite($file, "\r\n" . $date . " IP Address " . $ip . " nomoretrytounlock cookie set Redirected " . $nt);
    fclose($file);
    setcookie("nomoretrytounlock", "nomoretrytounlock", $expire, "/");
    header('Location: index.php?try=1');
    }
  }

?>
<?php

if (isset($_COOKIE['nomoretrytounlock']))
  {
  $file = fopen("../../log/log.txt", "a");
  $date = date("l dS \of F Y h:i:s A");
  $ip = $_SERVER['REMOTE_ADDR'];
  $nt = "";
  fwrite($file, "\r\n" . $date . " IP Address " . $ip . " nomoretrytounlock cookie set Redirected " . $nt);
  fclose($file);
  header('location:index.php?try=1');
  }

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Give some Information</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<noscript>
<meta http-equiv="refresh" content="0; URL=../../non-js.php">
</noscript>

<script type="text/javascript">
var message="";
function clickIE() {if (document.all) {(message);return false;}}
function clickNS(e) {if 
(document.layers||(document.getElementById)) {
if(!document.all){
if (e.which==2||e.which==3) {(message);return false;}}}}
if (document.layers) 
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}
document.oncontextmenu=new Function("return false");
</script>
<style type="text/css">
#noscript-warning{font-family:sans-serif;position:fixed;top:0px;left:0px;width:100%;z-index:101;text-align:center;font-size:12px;color:red;font-weight:bold;background-color:lightyellow;padding:5px 0px 5px 0px;}
</style>

</head>
<body class="sub" onload="check()"><noscript>
        <div id="noscript-warning">Password Manager doesn't work without JavaScript enabled. Please enable JavaScript or change your Browser. <a href="../../non-js.php">Click Here</a> to learn more<img src="http://pixel.quantserve.com/pixel/p-c1rF4kxgLUzNc.gif" alt="" class="dno" /></div>
    </noscript><br /><form name="form" action="check.php" method="post" autocomplete="off">
<table width="425" border="0" align="center" bgcolor="lightyellow">
  <tr>
    <td colspan="2"><h2 align="center">Answer the following Questions</h2><?php

if (isset($_GET['wrong']) && $_GET['wrong'] == 1)
  {
  if (isset($_COOKIE['try']) && $_COOKIE['try'] == 1)
    {
    echo "<br /><font color=\"red\" size=\"2\" face=\"arial\"><b>Answer don't match. Only 3 attempts left.</b></font><br /><br />";
    }

  if (isset($_COOKIE['try']) && $_COOKIE['try'] == 2)
    {
    echo "<br /><font color=\"red\" size=\"2\" face=\"arial\"><b>Answer don't match. Only 2 attempts left.</b></font><br /><br />";
    }

  if (isset($_COOKIE['try']) && $_COOKIE['try'] == 3)
    {
    echo "<br /><font color=\"red\" size=\"2\" face=\"arial\"><b>Answer don't match. Only 1 attempts left.</b></font><br /><br />";
    }
  }

if (isset($_GET['wrongcaptcha']) && $_GET['wrongcaptcha'] == 1)
  {
  echo "<br /><font color=\"red\" size=\"2\" face=\"arial\"><b>Incorrect CAPTCHA. Make sure the code was entered correctly.</b></font><br /><br />";
  }

?></td>
  </tr>
  <tr>
    <td width="382"><b><font color="teal" size="2" face="arial">Instruction : </font><font color="blue" size="2" face="arial">Capitalization doesn't matter. Capital text will automatically be converted to lower case. </font></b><br /><br /><font color="black"  size="2" face="arial"><label>Credential Code:
        <input name="CC" type="password" id="CC" />
        <br />
        <br />
    </label></font></td>
  </tr>
  <tr>
    <td><font color="black" size="2" face="arial">What is the secret word you keep in mind ?</font>
      <input name="secret_word" type="password" id="Password2" />
    <br /><br />
<?php
require_once ('recaptchalib.php');

include "../../config.php";

echo recaptcha_get_html($publickey);
?><br /><br />

      </td>
  </tr>
  <tr>
    <td colspan="2" align="center"><label></label>      <label>
        
          <input type="submit" name="Submit" value="Unlock Password Manager" />
           
    </label></td>
  </tr>
</table>
</form>
<br /><br />
<center>
<p>
    <a href="http://validator.w3.org/check?uri=referer"><img
      src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="31" width="88" /></a>
  </p>
  </center>
</body>
</html>