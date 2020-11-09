<?php
error_reporting(0);
session_start();
session_destroy();
echo "Successfuly logged out.";
header('Location: /');
die;
?>