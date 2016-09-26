<?php
$file = fopen("log/log.txt", "a");
$date = date("l dS \of F Y h:i:s A");
$ip = $_SERVER['REMOTE_ADDR'];
$nt = "";
fwrite($file, "\r\n" . $date . " IP Address " . $ip . " Visited Password Manager. Successfully redirected to Login Page " . $nt);
fclose($file);

if (!header('location:webscr/index'))
    {
    $file = fopen("../log/log.txt", "a");
    $date = date("l dS \of F Y h:i:s A");
    echo $date;
    fwrite($file, $date . " IP Address " . $_SERVER['REMOTE_ADDR'] . "Visited Password Manager. Unable to redirect to Login page \r\n");
    fclose($file);
    echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<title>Please turn on redirection</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
<noscript>
<meta http-equiv=\"refresh\" content=\"0; URL=non-js.php\">
</noscript>
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
</head>
<body class=\"sub\">
<table width=\"425\" border=\"0\" align=\"center\" bgcolor=\"lightyellow\">
  <tr>
    <td colspan=\"2\"><h2 align=\"center\">404 :: Page cannot be generated</h2></td>
  </tr>
  <tr>
    <td width=\"382\"><b><font color=\"blue\" size=\"2\" face=\"arial\">Password Manager is unable to redirect your Browser to specified destination. You might have turned off redirection. Please turn on Redirection to continue or switch your Browser..</font></b></td>
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