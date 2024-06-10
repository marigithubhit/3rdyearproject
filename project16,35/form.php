<?php
$username = $_POST("UserName");
$password = $_POST("password");
$admin_username = "admin";
$admin_password = "admin";
if(($username === $admin_username) && ($password === $admin_password)){
echo"Successfully Logged In"    
}else{
echo"Invalid login"
}

?>