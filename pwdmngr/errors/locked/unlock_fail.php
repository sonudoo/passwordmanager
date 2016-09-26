<?php
$file = fopen("../../log/log.txt", "a");
$date = date("l dS \of F Y h:i:s A");
$ip = $_SERVER['REMOTE_ADDR'];
$nt = "";
fwrite($file, "\r\n" . $date . " IP Address " . $ip . " Accessed Password Manager unlock failed to verify page " . $nt);
fclose($file);

if (isset($_GET['fail']))
  {
  }
  else
  {
  $file = fopen("../../log/log.txt", "a");
  $date = date("l dS \of F Y h:i:s A");
  $ip = $_SERVER['REMOTE_ADDR'];
  $nt = "";
  fwrite($file, "\r\n" . $date . " IP Address " . $ip . " fail not set Redirected " . $nt);
  fclose($file);
  header('location: index.php');
  }

?> <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<title>Failed to unlock</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />

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
<style type=\"text/css\">
#noscript-warning{font-family:sans-serif;position:fixed;top:0px;left:0px;width:100%;z-index:101;text-align:center;font-size:12px;color:red;font-weight:bold;background-color:lightyellow;padding:5px 0px 5px 0px;}
</style>
</head>
<body class=\"sub\">
<noscript>
        <div id=\"noscript-warning\">Password Manager doesn't work without JavaScript enabled. Please enable JavaScript or change your Browser. <a href=\"../../non-js.php\">Click Here</a> to learn more<img src=\"http://pixel.quantserve.com/pixel/p-c1rF4kxgLUzNc.gif\" alt=\"\" class=\"dno\" /></div>
    </noscript><br />
<table width="425" border="0" align="center" bgcolor="lightyellow">
  <tr>
    <td colspan="2"><h2 align="center">Failed to Unlock</h2></td>
  </tr>
  <tr>
    <td width="382"><b><font color="red" size="2" face="arial"><?php

if (isset($_GET['fail']) && $_GET['fail'] == 'expired')
  {
  $file = fopen("../../log/log.txt", "a");
  $date = date("l dS \of F Y h:i:s A");
  $ip = $_SERVER['REMOTE_ADDR'];
  $nt = "";
  fwrite($file, "\r\n" . $date . " IP Address " . $ip . " link expired " . $nt);
  fclose($file);
  echo "Sorry you clicked an expired link. Please go back and try again.";
  }
  else
if (isset($_GET['fail']) && $_GET['fail'] == 'wrong')
  {
  $file = fopen("../../log/log.txt", "a");
  $date = date("l dS \of F Y h:i:s A");
  $ip = $_SERVER['REMOTE_ADDR'];
  $nt = "";
  fwrite($file, "\r\n" . $date . " IP Address " . $ip . " wrong code " . $nt);
  fclose($file);
  echo "Sorry the verification link is wrong. So, we are blocking your computer from further unlocking.";
  setcookie("dontunlock", "dontunlock", time() + 30 * 24 * 60 * 60, "/");
  }
  else
  {
  header('Location: index.php');
  }

?></b></font></td>
  </tr>
</table>
<br /><br />
<center>
<p>
    <a href="http://validator.w3.org/check?uri=referer"><img
      src="http://www.w3.org/Icons/valid-xhtml10" alt="Valid XHTML 1.0 Transitional" height="31" width="88" /></a>
  </p>
  </center>
</body>
</html>