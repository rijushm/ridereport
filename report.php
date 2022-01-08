<?php
session_start();
require 'assets/php/utils.php';
require 'assets/php/sessionCheck.php';
require 'assets/php/ordinal.php';
require 'assets/php/getEmployeeSS.php';
include 'assets/db/conn.php';
if (!sessionCheck($conn)) {
	header("Location: ".$domain);
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Create Report</title>
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
				include 'assets/views/template/reportSection.php';
			}
		}
		include 'assets/views/foot.php';
	?>
	<script type="text/javascript">
		$('#reportspan').on('change', function(){
			var type;
			var email = "<?php echo $tokenData1; ?>";
			var value = $(this).val();
			if (value == '7' || value == '30') {
				var type = 'day';
				var url = "<?php echo $domain; ?>"+"/apis/report?email="+email+"&type="+type+"&time="+value;
			}else if (value == '6') {
				var type = 'month';
				var url = "<?php echo $domain; ?>"+"/apis/report?email="+email+"&type="+type+"&time="+value;
			}else if (value == '1') {
				var type = 'year';
				var url = "<?php echo $domain; ?>"+"/apis/report?email="+email+"&type="+type+"&time="+value;
			}else{
				var type = 'all';
				var url = "<?php echo $domain; ?>"+"/apis/report?email="+email+"&type=all";
			}
			$("#downloadReport").attr('href', url);
		})
	</script>
</body>
</html>