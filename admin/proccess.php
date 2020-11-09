<?php
session_start();
$correct_password = password_hash("password", PASSWORD_DEFAULT);
$correct_username = "admin";  
if(password_verify($_POST['password'], $correct_password) == true && $_POST['username'] == $correct_username){
	
  $_SESSION['logged_in'] = true;
  
  header("Location: /admin/nuke");
}
else{ 
header("Location: /logout");
die();
}