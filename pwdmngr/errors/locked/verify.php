<?php
$file = fopen("../../log/log.txt", "a");
$date = date("l dS \of F Y h:i:s A");
$ip = $_SERVER['REMOTE_ADDR'];
$nt = "";
fwrite($file, "\r\n" . $date . " IP Address " . $ip . " Accessed Password manager unlock verify page " . $nt);
fclose($file);

if (isset($_COOKIE['dontunlock']))
    {
    $file = fopen("../../log/log.txt", "a");
    $date = date("l dS \of F Y h:i:s A");
    $ip = $_SERVER['REMOTE_ADDR'];
    $nt = "";
    fwrite($file, "\r\n" . $date . " IP Address " . $ip . " dontunlock cookie set Redirected to failed page " . $nt);
    fclose($file);
    header('location:unlock_fail.php?fail=wrong');
    }
  else
    {
    include "../../configdb.php";

    $result = mysql_query("SELECT * FROM status");
    while ($row = mysql_fetch_array($result))
        {
        $status = $row['status'];
        }

    if ($status == 'unlocked')
        {
        $file = fopen("../../log/log.txt", "a");
        $date = date("l dS \of F Y h:i:s A");
        $ip = $_SERVER['REMOTE_ADDR'];
        $nt = "";
        fwrite($file, "\r\n" . $date . " IP Address " . $ip . " Password Manager is already unlocked " . $nt);
        fclose($file);
        echo "<!DOCTYPE html PUBLIC \"-//W3C//DTD XHTML 1.0 Transitional//EN\" \"http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd\">
<html xmlns=\"http://www.w3.org/1999/xhtml\">
<head>
<title>Password Manager is already unlocked</title>
<meta http-equiv=\"Content-Type\" content=\"text/html; charset=iso-8859-1\" />
</head>
<body class=\"sub\">
<table width=\"425\" border=\"0\" align=\"center\" bgcolor=\"lightyellow\">
  <tr>
    <td colspan=\"2\"><h2 align=\"center\">Password Manager is already unlocked</h2></td>
  </tr>
  <tr>
    <td width=\"382\"><b><font color=\"blue\" size=\"2\" face=\"arial\">Password Manager did a secure query of Database and found that Password Manager is already unlocked. This link will no more work. Please delete the mail received even from Trash folder for security purposes.</font></b></td>
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
        $code = $_GET['id'];
        session_start();
        if (isset($_SESSION['code']))
            {
            $file = fopen("../../log/log.txt", "a");
            $date = date("l dS \of F Y h:i:s A");
            $ip = $_SERVER['REMOTE_ADDR'];
            $nt = "";
            fwrite($file, "\r\n" . $date . " IP Address " . $ip . " Code is set Waiting for verification " . $nt);
            fclose($file);
            $code1 = $_SESSION['code'];
            if ($code == $code1)
                {
                $file = fopen("../../log/log.txt", "a");
                $date = date("l dS \of F Y h:i:s A");
                $ip = $_SERVER['REMOTE_ADDR'];
                $nt = "";
                fwrite($file, "\r\n" . $date . " IP Address " . $ip . " Successfully verified Redirected to destroy cookies " . $nt);
                fclose($file);
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
                }
              else
                {
                $file = fopen("../../log/log.txt", "a");
                $date = date("l dS \of F Y h:i:s A");
                $ip = $_SERVER['REMOTE_ADDR'];
                $nt = "";
                fwrite($file, "\r\n" . $date . " IP Address " . $ip . " Failed to verify Invalid code Set dontunlock Blocked the computer Redirected to fail page " . $nt);
                fclose($file);
                setcookie("dontunlock", "dontunlock", time() + 360000, "/");
                session_start();
                session_destroy();
                header('location:unlock_fail.php?fail=wrong');
                }
            }
          else
            {
            $file = fopen("../../log/log.txt", "a");
            $date = date("l dS \of F Y h:i:s A");
            $ip = $_SERVER['REMOTE_ADDR'];
            $nt = "";
            fwrite($file, "\r\n" . $date . " IP Address " . $ip . " Falied to unlock Expired link Redirected to fail page " . $nt);
            fclose($file);
            setcookie("mailedtounlock", "", time() - 3600, "/");
            setcookie("nomoretrytounlock", "", time() - 3600, "/");
            header('location:unlock_fail.php?fail=expired');
            }
        }

    mysql_close($con);
    }

?>