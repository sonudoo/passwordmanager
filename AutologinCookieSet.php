<?php
$cookie_name = "pin_post";
$cookie_value = "27810d8aed732a494b7c10f1aaabcc8e5167d299c2d25792325526";
setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
$cookie_name2 = "autologin_key";
$cookie_value2 = "b3785677f32d08b06e8ee22caa4ffe695167d299c2d35711952175";
setcookie($cookie_name2, $cookie_value2, time() + (86400 * 30), "/"); // 86400 = 1 day
?>