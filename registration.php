<?php
session_start();
require 'assets/php/utils.php';
require 'assets/php/sessionCheck.php';
require 'assets/php/logout.php';
require 'assets/php/emailValidate.php';
include 'assets/db/conn.php';
if (sessionCheck($conn)) {
	logout();
}
if (isset($_SESSION['registration'])) {
	if (emailValidate($conn, $_SESSION['registration'])) {
		$emailValStep = true;
		$email =  $_SESSION['registration'];
	}else{
		$emailValStep = false;
	}
}else{
	header("Location: ".$domain."/register?credentials=invalid");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Registration</title>
	<?php include 'assets/views/head.php' ?>
</head>
<body>
	<?php
		include 'assets/views/template/registrationSection.php';
	?>
	<?php include 'assets/views/foot.php' ?>
</body>
</html>