<?php
function uidCheck($conn, $id){
	$queryUIDVal = "select * from `requests` where `uid` = '$id'";
	$resUIDVal = mysqli_query($conn, $queryUIDVal);
	if (mysqli_num_rows($resUIDVal)) {
		return true;
	}else{
		return false;
	}
}
?>