<?php
$id = $_GET["id"];
// Turn off all error reporting
error_reporting(0);
session_start();
if(isset($_SESSION['logged_in']) and $_SESSION['logged_in'] == true): ?>
<?php 
session_start();
 require('../connect.php');


$query = "UPDATE turnitin SET active = '1' WHERE id = $id";

 
$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);


header('Location: /admin/nuke');

else:
	header('Location: /logout');
 endif;