<?php
function deviceId($conn, $email){
	$queryEmailVal = "select * from `users` where `email` = '$email' limit 1";
	$resEmailVal = mysqli_query($conn, $queryEmailVal);
	if (mysqli_num_rows($resEmailVal)) {
		while($row = mysqli_fetch_array($resEmailVal)){
			$deviceIdDb = $row['deviceID'];
		}
		return $deviceIdDb;
	}else{
		return false;
	}
}
?>