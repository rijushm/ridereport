<?php
function sessionCheck($conn){
	if (isset($_SESSION['rideutilswow']) && $_SESSION['rideutilswow'] != '') {
		$rideutilswow = $_SESSION['rideutilswow'];
		$token = explode("yy22",$rideutilswow);
		$token1 = $token[0];
		$token2 = $token[1];
		$queryChkUser = "select * from `users` where `email` = '$token1' and `employeeID` = '$token2' limit 1";
		$resChkUser = mysqli_query($conn, $queryChkUser);
		if (mysqli_num_rows($resChkUser)) {
			return true;
		}
	}else{
		return false;
	}
}
?>