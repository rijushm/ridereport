<?php
session_start();
require '../assets/php/emailValidate.php';
// require '../assets/php/reqmailer.php';
require '../assets/php/utils.php';
include '../assets/db/conn.php';
if (isset($_POST['pickup']) && isset($_POST['destination']) && isset($_POST['type']) && isset($_POST['employee'])) {
	if (!emailValidate($conn, $_POST['employee'])) {
		header("Location: ".$domain."/request?info=invalid");
	}else{
		date_default_timezone_set('Asia/Kolkata');
		$time = date("Y-m-d H:i:s");
		$pickup = $_POST['pickup'];
		$destination = $_POST['destination'];
		$type = $_POST['type'];
		$email = $_POST['employee'];
		$query = "INSERT INTO `requests`(`uid`, `employee`, `pickup`, `destination`, `type`, `time`) VALUES (UUID(),'$email','$pickup','$destination','$type','$time')";
		$res = mysqli_query($conn, $query);
		if ($res) {
			//echo "Request has been sent succesfuly";
			include '../assets/php/reqmailer.php';
			if ($send_email) {
				header("Location: ".$domain."/request?info=sent");
			}else{
				header("Location: ".$domain."/request?info=sent");
			}
		}else{
			// header("Location: ".$domain."/request?info=invalid2");
			echo "Something went wrong! Reason: ".$conn -> error;
		}
	}
}else{
	header("Location: ".$domain."/request?info=invalid");
}
?>