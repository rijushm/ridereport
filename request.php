<?php
session_start();
require 'assets/php/utils.php';
require 'assets/php/sessionCheck.php';
require 'assets/php/getEmployeeSS.php';
include 'assets/db/conn.php';
if (!sessionCheck($conn)) {
	header("Location: ".$domain);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Request</title>
	<?php include 'assets/views/head.php' ?>
</head>
<body>
	<?php
		if (sessionCheck($conn)) {
			$ssData = $_SESSION['rideutilswow'];
			$tokenData = explode("yy22",$ssData);
			$tokenData1 = $tokenData[0];
			$tokenData2 = $tokenData[1];
			$queryDash = "select * from `users` where `email` = '$tokenData1' and `employeeID` = '$tokenData2' limit 1";
			$resDash = mysqli_query($conn, $queryDash);
			if (mysqli_num_rows($resDash)) {
				while($data = mysqli_fetch_array($resDash)){
					include 'assets/views/template/requestSection.php';
				}
			}
		}
	?>
	<?php include 'assets/views/foot.php' ?>
</body>
</html>