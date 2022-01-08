<?php
session_start();
require 'assets/php/utils.php';
require 'assets/php/sessionCheck.php';
include 'assets/db/conn.php';
if (sessionCheck($conn)) {
	header("Location: ".$domain."/dashboard");
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Development - Wowmomo Report</title>
	<?php include 'assets/views/head.php' ?>
</head>
<body>
	<?php
		if (!sessionCheck($conn)) {
			include 'assets/views/template/loginSection.php';
		}
	?>
	<?php include 'assets/views/foot.php' ?>
</body>
</html>