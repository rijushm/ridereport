<?php
session_start();
require 'assets/php/utils.php';
require 'assets/php/sessionCheck.php';
require 'assets/php/logout.php';
require 'assets/php/emailValidate.php';
require 'assets/php/accountValidate.php';
include 'assets/db/conn.php';
if (sessionCheck($conn)) {
	logout();
}
if (isset($_POST['email'])) {
	if (emailValidate($conn, $_POST['email'])) {
		if (accountValidate($conn, $_POST['email'])){
			header("Location: ".$domain."/registration");
			$_SESSION['registration'] = $_POST['email'];
		}else{
			header("Location: ".$domain."/register?credentials=created");
		}
	}else{
		header("Location: ".$domain."/register?credentials=invalid");
	}
}
if (isset($_GET['email'])) {
	if (emailValidate($conn, $_GET['email'])) {
		if (accountValidate($conn, $_GET['email'])){
			header("Location: ".$domain."/registration");
			$_SESSION['registration'] = $_GET['email'];
		}else{
			header("Location: ".$domain."/register?credentials=created");
		}
	}else{
		header("Location: ".$domain."/register?credentials=invalid");
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Email Verification</title>
	<?php include 'assets/views/head.php' ?>
</head>
<body>
	<?php
		include 'assets/views/template/registerSection.php';
	?>
	<?php include 'assets/views/foot.php' ?>
</body>
</html>