<?php

// Delete cookie login
$cookieLogin = setcookie("login", "", time() - (3600 * 24), '/' );
$cookieEmail = setcookie("email", "", time() - (3600 * 24), '/' );

if($cookieLogin && $cookieEmail ){
    header("Location:../../frontend/user/signin.php");
}
else{
    header("Location: ../../frontend/user/home.php");
}
