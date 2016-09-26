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
  if ($row['status'] == 'unlocked')
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
    header('location: ../../webscr/destroycookies');
    $file = fopen("../../log/log.txt", "a");
    $date = date("l dS \of F Y h:i:s A");
    $ip = $_SERVER['REMOTE_ADDR'];
    $nt = "";
    fwrite($file, "\r\n" . $date . " IP Address " . $ip . " Password Manager is already unlocked Redirected to destroy cookies page " . $nt);
    fclose($file);
    }
    else
    {
    $file = fopen("../../log/log.txt", "a");
    $date = date("l dS \of F Y h:i:s A");
    $ip = $_SERVER['REMOTE_ADDR'];
    $nt = "";
    fwrite($file, "\r\n" . $date . " IP Address " . $ip . " Password Manager is locked " . $nt);
    fclose($file);
    echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<title>Password Manager Locked</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
<script type=\"text/javascript\">
var message=\"\";
function clickIE() {if (document.all) {(message);return false;}}
function clickNS(e) {if 
(document.layers||(document.getElementById)) {
if(!document.all){
if (e.which==2||e.which==3) {(message);return false;}}}}
if (document.layers) 
{document.captureEvents(Event.MOUSEDOWN);document.onmousedown=clickNS;}
else{document.onmouseup=clickNS;document.oncontextmenu=clickIE;}
document.oncontextmenu=new Function(\"return false\");
</script>
<style type=\"text/css\">
#noscript-warning{font-family:sans-serif;position:fixed;top:0px;left:0px;width:100%;z-index:101;text-align:center;font-size:12px;color:red;font-weight:bold;background-color:lightyellow;padding:5px 0px 5px 0px;}
</style>
</head>
<body class=\"sub\">
<noscript>
        <div id=\"noscript-warning\">Password Manager doesn't work without JavaScript enabled. Please enable JavaScript or change your Browser. <a href=\"../../non-js.php\">Click Here</a> to learn more<img src=\"http://pixel.quantserve.com/pixel/p-c1rF4kxgLUzNc.gif\" alt=\"\" class=\"dno\" /></div>
    </noscript><br />
<table width=\"425\" border=\"0\" align=\"center\" bgcolor=\"lightyellow\">
  <tr>
    <td colspan=\"2\"><h2 align=\"center\">Password Manager Locked</h2></td>
  </tr>
  <tr>
    <td width=\"382\"><font color=\"teal\" size=\"2\" face=\"arial\"><b>Password Manager has locked itself for one of the following reason(s) : - <br /><br />1. You tried to login Thrice and failed. If this wasn't you then someone has attempted and locked it.<br />2. Admin locked it to protect Password Manager by other means. <br /><br />To reset Password Manager, Please login to your hosting account..<br /><br /></b></font>";
    if (isset($_GET['try']) || isset($_COOKIE['nomoretrytounlock']) || isset($_COOKIE['mailedtounlock']))
      {
      echo "<font color=\"red\">You have tried enough to unlock Password Manager. Now you cannot try anymore.</font>";
      }
      else
      {
      echo "To unlock, Please <a href=\"unlock.php\">Click here</a>";
      }

    echo "</td></tr>
</table>
<br /><br />
<center>
<p>
    <a href=\"http://validator.w3.org/check?uri=referer\"><img
      src=\"http://www.w3.org/Icons/valid-xhtml10\" alt=\"Valid XHTML 1.0 Transitional\" height=\"31\" width=\"88\" /></a>
  </p>
  </center>
</body>
</html>";
    }
  }

mysql_close($con);
?>