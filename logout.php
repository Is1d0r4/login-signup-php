<?php
ob_start();
session_start();
if(isset($_SESSION['email'])) {
	session_destroy();
	unset($_SESSION['email']);
	header("Location: index.php");
} else {
	header("Location: dashboard.php");
}
?>