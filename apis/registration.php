<?php
session_start();
require '../assets/php/emailValidate.php';
include '../assets/db/conn.php';
require '../assets/php/utils.php';
if (isset($_POST['email']) && isset($_POST['name']) && isset($_POST['phone']) && isset($_POST['password']) && isset($_POST['conPassword']) && $_SESSION['registration']) {
	if ($_POST['password'] != $_POST['conPassword']) {
		header("Location: ".$domain."/registration?info=passwwordnotmatched");
	}else if (strlen($_POST['password']) < 6) {
		header("Location: ".$domain."/registration?info=shortpassword");
	}else{
		if (!emailValidate($conn, $_SESSION['registration'])) {
			header("Location: ".$domain."/register?info=invalid");
		}else{
			$name = $_POST['name'];
			$email = $_POST['email'];
			$phone = $_POST['phone'];
			// employee ID
			$employeeID = 'ABCD123456';
			$password = password_hash($_POST['password'], PASSWORD_BCRYPT, $options);
			$query = "update `users` set `name` = '$name', `phone` = '$phone', `employeeID` = '$employeeID', `password` = '$password' where `email` = '$email'";
			$res = mysqli_query($conn, $query);
			if ($res) {
				mysqli_close($conn);
				header("Location: ".$domain."?credentials=success");
			}else{
				echo "Not Inserted ".$conn -> error;
			}
		}
	}
}
?>