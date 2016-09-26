<?php
$file = fopen("../../log/log.txt", "a");
$date = date("l dS \of F Y h:i:s A");
$ip = $_SERVER['REMOTE_ADDR'];
$nt = "";
fwrite($file, "\r\n" . $date . " IP Address " . $ip . " Accessed Password Manager unlock check page " . $nt);
fclose($file);
include "../../configdb.php";

$result = mysql_query("SELECT * FROM status");

while ($row = mysql_fetch_array($result))
  {
  if ($row['status'] == 'unlocked')
    {
    setcookie("unlockednow", "unlockednow", time() + 3600, "/");
    header('Location:unlock_successful.php');
    $file = fopen("../../log/log.txt", "a");
    $date = date("l dS \of F Y h:i:s A");
    $ip = $_SERVER['REMOTE_ADDR'];
    $nt = "";
    fwrite($file, "\r\n" . $date . " IP Address " . $ip . " Password Manager is already unlocked Redirected " . $nt);
    fclose($file);
    }
    else
    {
    }
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
  require_once ('recaptchalib.php');

  include "../../config.php";

  $resp = recaptcha_check_answer($privatekey, $_SERVER["REMOTE_ADDR"], $_POST["recaptcha_challenge_field"], $_POST["recaptcha_response_field"]);
  if (!$resp->is_valid)
    {
    $file = fopen("../../log/log.txt", "a");
    $date = date("l dS \of F Y h:i:s A");
    $ip = $_SERVER['REMOTE_ADDR'];
    $nt = "";
    fwrite($file, "\r\n" . $date . " IP Address " . $ip . " Failed to answer Captcha Redirected " . $nt);
    fclose($file);
    header('location: unlock.php?wrongcaptcha=1');
    }
    else
    {
    include "../../config.php";

    echo recaptcha_get_html($publickey);
    $CC = addslashes(htmlspecialchars(mysql_real_escape_string($_POST['CC'])));
    $secret_word1 = addslashes(htmlspecialchars(mysql_real_escape_string($_POST['secret_word'])));
    if ($CC == $credentialcode)
      {
      if ($secret_word1 == $secret_word)
        {
        $file = fopen("../../log/log.txt", "a");
        $date = date("l dS \of F Y h:i:s A");
        $ip = $_SERVER['REMOTE_ADDR'];
        $nt = "";
        fwrite($file, "\r\n" . $date . " IP Address " . $ip . " Successfully verified security answers Mail sent Redirected " . $nt);
        fclose($file);
        session_start();
        $random = substr(number_format(time() * rand() , 0, '', '') , 0, 10);
        $_SESSION['code'] = $random;
        $to = $email;
        $from = "pwdmanager@" . $_SERVER['SERVER_NAME'];
        $subject = "Unlock your Password Manager here";
        $url = $_SERVER['REQUEST_URI'];
        $parts = explode('/', $url);
        $dir = $_SERVER['SERVER_NAME'];
        for ($i = 0; $i < count($parts) - 1; $i++)
          {
          $dir.= $parts[$i] . "/";
          }

        $actual_link = "http://" . $dir . "verify.php?id=" . $random;
        $message = "<<<EOF
<html>
  <body bgcolor=\"#DCEEFC\">
        <h4 align=\"center\">You have received this mail because you have tried to unlock the Password Manager</h4> <br /><br />***********************************************************************************************************************************************************************
        <br /><br /><font color=\"green\">Hello Sushant,</font> <br /><br />
You have requested for to unlock the Password Manager. <br /><br /><u>Instruction</u><ul><li>Remember to open the link in the same browser that was used to unlock Password Manager.<li>For security purposes this link will expire in 10 minutes form being sent. </ul><br /><br /><a href=" . $actual_link . ">Click here</a> to unlock Password Manager.<br />
<br />
If the link is not clickable then copy and paste the following address :
<br /><br />
" . $actual_link . "<br /><br /><br /><br />
Have a good day.<br /><br />***********************************************************************************************************************************************************************
  </body>
</html>
EOF";
        $headers = "From: $from\r\n";
        $headers.= "Content-type: text/html\r\n";
        mail($to, $subject, $message, $headers);
        $expire = time() + 60 * 60 * 24 * 365;
        setcookie("mailedtounlock", "mailedtounlock", $expire, "/");
        setcookie("nomoretrytounlock", "nomoretrytounlock", $expire, "/");
        header('Location: mailsent.php');
        }
        else
        {
        $file = fopen("../../log/log.txt", "a");
        $date = date("l dS \of F Y h:i:s A");
        $ip = $_SERVER['REMOTE_ADDR'];
        $nt = "";
        fwrite($file, "\r\n" . $date . " IP Address " . $ip . " Failed to answer security questions Redirected " . $nt);
        fclose($file);
        if (isset($_COOKIE['try']))
          {
          $try = $_COOKIE['try'] + 1;
          setcookie("try", "$try", $expire, "/");
          }
          else
          {
          setcookie("try", "1", $expire, "/");
          }

        header('Location: unlock.php?wrong=1');
        }
      }
      else
      {
      $file = fopen("../../log/log.txt", "a");
      $date = date("l dS \of F Y h:i:s A");
      $ip = $_SERVER['REMOTE_ADDR'];
      $nt = "";
      fwrite($file, "\r\n" . $date . " IP Address " . $ip . " Failed to answer security questions Redirected " . $nt);
      fclose($file);
      if (isset($_COOKIE['try']))
        {
        $try = $_COOKIE['try'] + 1;
        setcookie("try", "$try", $expire, "/");
        }
        else
        {
        setcookie("try", "1", $expire, "/");
        }

      header('Location: unlock.php?wrong=1');
      }
    }
  }

?>