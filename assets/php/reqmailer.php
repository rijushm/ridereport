<?php
$query1 = "select * from `requests` where `employee` = '$email'  ORDER BY `time` DESC limit 1";
$res1 = mysqli_query($conn, $query1);
if (mysqli_num_rows($res1)) {
	while ($row = mysqli_fetch_array($res1)) {
		$uid = $row['uid'];
		$pickup = $row['pickup'];
		$destination = $row['destination'];
		$reqtime = $row['time'];
	}
	$query2 = "select * from `users` where `email` = '$email'";
	$res2 = mysqli_query($conn, $query2);
	while ($row2 = mysqli_fetch_array($res2)) {
		$name = $row2['name'];
		$phone = $row2['phone'];
	}

	$linkAccept = $domain.'/apis/acceptstatus.php?name='.$name.'&uid='.$uid.'&employee='.$email;
	$linkReject = $domain.'/apis/rejectstatus.php?name='.$name.'&uid='.$uid.'&employee='.$email;

	include 'mailer/reqmailer.php';
}
?>