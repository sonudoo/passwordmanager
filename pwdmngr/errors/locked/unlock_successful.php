<?php
$file = fopen("../../log/log.txt", "a");
$date = date("l dS \of F Y h:i:s A");
$ip = $_SERVER['REMOTE_ADDR'];
$nt = "";
fwrite($file, "\r\n" . $date . " IP Address " . $ip . " Accessed unlock successful page " . $nt);
fclose($file);

if (isset($_COOKIE['unlockednow']))
    {
    include "../../configdb.php";

    $result = mysql_query("SELECT * FROM status");
    while ($row = mysql_fetch_array($result))
        {
        $status = $row['status'];
        }

    if ($status == 'unlocked')
        {
        mysql_query("TRUNCATE table unlockednow");
        setcookie("unlockednow", "unlockednow", time() - 300, "/");
        echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<title>Password Manager Unlocked</title>
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
    <td colspan=\"2\"><h2 align=\"center\">Password Manager Unlocked</h2></td>
  </tr>
  <tr>
    <td width=\"382\"><font color=\"blue\" size=\"2\" face=\"arial\"><b>Congratulations, Password Manager has been successfully unlocked. You can now login again. To Login Please use another Browser or you may be blocked again.</b></font></td>
  </tr>
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
      else
        {
        $file = fopen("../../log/log.txt", "a");
        $date = date("l dS \of F Y h:i:s A");
        $ip = $_SERVER['REMOTE_ADDR'];
        $nt = "";
        fwrite($file, "\r\n" . $date . " IP Address " . $ip . " Password manager is still locked " . $nt);
        fclose($file);
        echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<title>404 :: Page cannot be generated</title>
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
    <td colspan=\"2\"><h2 align=\"center\">404 :: Page cannot be generated</h2></td>
  </tr>
  <tr>
    <td width=\"382\"><font color=\"blue\" size=\"2\" face=\"arial\"><b>Password Manager is unable to serve this page now due to redirection error. This may be because of direct access to this page.</b></font></td>
  </tr>
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

    mysql_close($con);
    }
  else
    {
    $file = fopen("../../log/log.txt", "a");
    $date = date("l dS \of F Y h:i:s A");
    $ip = $_SERVER['REMOTE_ADDR'];
    $nt = "";
    fwrite($file, "\r\n" . $date . " IP Address " . $ip . " 404 unlockednow cookie not set " . $nt);
    fclose($file);
    echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<title>404 :: Page cannot be generated</title>
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
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
<style type=\"text/css\">
#noscript-warning{font-family:sans-serif;position:fixed;top:0px;left:0px;width:100%;z-index:101;text-align:center;font-size:12px;color:red;font-weight:bold;background-color:lightyellow;padding:5px 0px 5px 0px;}
</style>
</head>
<body class=\"sub\">
<noscript>
        <div id=\"noscript-warning\">Password Manager doesn't work without JavaScript enabled. Please enable JavaScript or change your Browser. <a href=\"http://localhost/non-js.php\">Click Here</a> to learn more<img src=\"http://pixel.quantserve.com/pixel/p-c1rF4kxgLUzNc.gif\" alt=\"\" class=\"dno\" /></div>
    </noscript><br />
<table width=\"425\" border=\"0\" align=\"center\" bgcolor=\"lightyellow\">
  <tr>
    <td colspan=\"2\"><h2 align=\"center\">404 :: Page cannot be generated</h2></td>
  </tr>
  <tr>
    <td width=\"382\"><font color=\"blue\" size=\"2\" face=\"arial\"><b>Password Manager is unable to serve this page now due to redirection error. This may be because of direct access to this page.</b></font></td>
  </tr>
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

?> 