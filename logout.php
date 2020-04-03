<?php
session_start();
unset($_SESSION['username']);
session_destroy();
header("Location: login.php");
/*$url = "index.php";
if(isset($_GET["session_expired"])) {
	$url .= "?session_expired=" . $_GET["session_expired"];
}
header("Location:$url"); */
?>