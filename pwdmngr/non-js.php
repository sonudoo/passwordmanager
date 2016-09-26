<?php
$file = fopen("log/log.txt", "a");
$date = date("l dS \of F Y h:i:s A");
$ip = $_SERVER['REMOTE_ADDR'];
$nt = "";
fwrite($file, "\r\n" . $date . " IP Address " . $ip . " Accessed non-js.php. Detected non-js browser. " . $nt);
fclose($file);
echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<title>Non-javascript browser</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
<script type=\"text/javascript\">
window.location = \"index.php\";
</script>
</head>
<body class=\"sub\">
<table width=\"400\" border=\"0\" align=\"center\" bgcolor=\"lightyellow\">
  <tr>
    <td colspan=\"2\"><h2 align=\"center\">Non-javascript browser</h2></td>
  </tr>
  <tr>
    <td width=\"400\"><b><font color=\"blue\" size=\"2\" face=\"arial\">The Browser you are using doesn't support JavaScript. This may be because you have turned it off. Please turn on JavaScript to access Password Manager. Alternatively you can change your Browser.</font></b></td>
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
?>