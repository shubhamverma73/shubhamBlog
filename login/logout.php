<?php
session_start();

if(isset($_SESSION['user_id'])) {
	unset($_SESSION['user_id']);
	unset($_SESSION['email']);
	unset($_SESSION['message']);
	unset($_SESSION['profile_id']);
	session_destroy();
	$_SESSION['message'] = 'Logout Successfully';
	header('Location: login.php');
}
?>