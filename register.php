<?php
session_start();

$user_password =  $_POST["password"];
//$user_password_hash = sha1($user_password);
$user_password_hash = password_hash($user_password, PASSWORD_DEFAULT);
//password_hash($user_password, PASSWORD_BCRYPT);

echo $user_password_hash;
echo "<BR><BR>";
//$user_password_hash == $password_hash
$password_hash = '$2y$10$vVHlkgQ/aput/kWQKhkJgO8hRiKUVEhG9uJ7RKXMadHWtU4IYQBVK';
if(password_verify($user_password, $password_hash)) {
   echo "<BR><BR>if jest true";
} 
else 
    echo "<BR><BR>if jest FALSE"

?>


<br><br><br><br><br><br>
LOL
<br><br>
$2y$10$8zss8EVMIO7A5tEAjQStW.cyUdGkDI/Y5e9X74yJMYxZBgAH9ok8u
$2y$10$GHrBcIKprR45veOW.ohOSOZgENcy/XXkGB9HJNaP1mz9sAnaQ.X/y
$2y$10$O4c7JPHwxG7kMPHZZOLBYOjrxQH2VN.U.QRgGIbwhr0G6TAHXbY6G
$2y$10$73TNKqh.whUIkfcYG2zSRuh.6QPPR1nVPBYRTEUJjrcct16Md1g1i 
$2y$10$vVHlkgQ/aput/kWQKhkJgO8hRiKUVEhG9uJ7RKXMadHWtU4IYQBVK 
$2y$10$GMENwrZt9zIDOmCi/yLsE.1cXguSfibVXHTXxfI8iX7vNCxxsUocC
<br><br>
LOL
<br><br>


