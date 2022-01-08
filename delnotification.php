<?php
session_start();
require 'assets/php/utils.php';
require 'assets/php/sessionCheck.php';
require 'assets/php/accountValidate.php';
include 'assets/db/conn.php';
if (!sessionCheck($conn)) {
	header("Location: ".$domain."/dashboard?info=error");
}else if (isset($_GET['email'])) {
	$email = $_GET['email'];
	if (!accountValidate($conn, $email)) {
		header("Location: ".$domain."/dashboard?info=error");
	}else{
		$cquery = "select * from `users` where `deviceId` = 'none'";
		$cres = mysqli_query($conn, $cquery);
		if (!mysqli_num_rows($cres)) {
			$query = "update `users` set `deviceID` = 'none' where `email` = '$email'";
			$res = mysqli_query($conn, $query);
			if ($res) {
				mysqli_close($conn);
				header("Location: ".$domain."/dashboard?notification=removed");
			}else{
				header("Location: ".$domain."/dashboard?info=".$conn -> error);
			}
		}
	}
}else{
	header("Location: ".$domain."/dashboard?info=error");
}

?>
