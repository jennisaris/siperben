<?php
 $c = file_get_contents("/var/www/html/application/config/config.php");
 $c = preg_replace("/cookie_secure.\]\s*= FALSE/", "cookie_secure"] = FALSE", $c);
 $c = preg_replace("/cookie_httponly.\]\s*= FALSE/", "cookie_httponly"] = TRUE", $c);
 file_put_contents("/var/www/html/application/config/config.php", $c);
 echo "done\n";
?>
