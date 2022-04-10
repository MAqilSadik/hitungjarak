<?php 
setcookie("username", "Aqil", time() + 60);
echo "cookie ok";
echo $_COOKIE['username'];

?>