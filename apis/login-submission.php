<?php
session_start();
include '../assets/db/conn.php';
require '../assets/php/utils.php';
if (isset($_POST['email']) && isset($_POST['password'])) {
	$email = $_POST['email'];
	$password = $_POST['password'];
	$query = "select * from `users` where `email` = '$email' limit 1";
	$res = mysqli_query($conn, $query);
	if (mysqli_num_rows($res)) {
		while ($row = mysqli_fetch_array($res)) {
			$passDB = $row['password'];
			$employee = $row['employeeID'];
			if (password_verify($password, $passDB)){
				$token = $email.'yy22'.$employee;
				// echo $token;
				$_SESSION['rideutilswow'] = $token;
				if (isset($_SESSION['rideutilswow'])) {
					header("Location: ".$domain."/dashboard");
				}
			}else{
				header("Location: ".$domain."?credentials=invalid");
			}
		}
	}else{
		header("Location: ".$domain."?credentials=invalid");
	}
}
?>