<?php
function accountValidate($conn, $email){
	$queryEmailVal = "select * from `users` where `email` = '$email' and `status` = 'verified'";
	$resEmailVal = mysqli_query($conn, $queryEmailVal);
	if (mysqli_num_rows($resEmailVal)) {
		return true;
	}else{
		return false;
	}
}
?>