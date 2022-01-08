<?php
session_start();
require 'assets/php/utils.php';
require 'assets/php/sessionCheck.php';
require 'assets/php/uidCheck.php';
require 'assets/php/ordinal.php';
include 'assets/db/conn.php';
if (!sessionCheck($conn)) {
	header("Location: ".$domain);
}
if (isset($_GET['id'])) {
	$uid = $_GET['id'];
	if (uidCheck($conn, $uid)) {
		//echo 'ok';
	}else{
		header("Location: ".$domain.'/error');
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Request</title>
	<?php include 'assets/views/head.php' ?>
</head>
<body>
	<?php
	$queryuid = "select * from `requests` where `uid` = '$uid'";
	$resuid = mysqli_query($conn, $queryuid);
	if (mysqli_num_rows($resuid)) {
		while($data = mysqli_fetch_array($resuid)){
			include 'assets/views/template/requestsSection.php';
		}
	}else{
		echo 'Somthing went wrong! Invalid Request';
	}
	?>
	<?php include 'assets/views/foot.php' ?>
</body>
</html>