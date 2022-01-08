<?php
include '../assets/php/utils.php';
include '../assets/php/deviceId.php';
include '../assets/db/conn.php';
if (isset($_GET['name']) && isset($_GET['uid']) && isset($_GET['employee'])){
	$name = $_GET['name'];
	$uid = $_GET['uid'];
	$email = $_GET['employee'];
	$query = "select * from `requests` where `uid` = '$uid' and `employee` = '$email'";
	$res = mysqli_query($conn, $query);
	if (mysqli_num_rows($res)) {
		while ($row = mysqli_fetch_array($res)) {
			if ($row['status'] == 'pending') {
				$pickup = $row['pickup'];
				$destination = $row['destination'];
				date_default_timezone_set('Asia/Kolkata');
				$uptime = date("Y-m-d H:i:s");
				$upquery = "update `requests` set `status` = 'rejected', `updateTime` = '$uptime' where `uid` = '$uid' and `employee` = '$email'";
				$upres = mysqli_query($conn, $upquery);
				if ($upres) {
					if (deviceId($conn, $email) != false) {
						$deviceId = deviceId($conn, $email);
						include '../assets/views/sendrejectnotice.php';
					}
					include '../assets/views/status/reject.php';
				}else{
					include '../assets/views/error/error.php';
				}
			}else{
				echo 'This Request is already approved';
			}
		}
	}else{
		echo 'The Request is not exist!';
	}
}
?>