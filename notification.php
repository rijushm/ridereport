<?php
session_start();
require 'assets/php/utils.php';
require 'assets/php/sessionCheck.php';
require 'assets/php/accountValidate.php';
include 'assets/db/conn.php';
if (!sessionCheck($conn)) {
	header("Location: ".$domain."/dashboard?info=error");
}else if (isset($_GET['email'])) {
	$email = $_GET['email'];
	if (!accountValidate($conn, $email)) {
		header("Location: ".$domain."/dashboard?info=error");
	}else{
		$cquery = "select * from `users` where `deviceId` = 'none'";
		$cres = mysqli_query($conn, $cquery);
		if (!mysqli_num_rows($cres)) {
			header("Location: ".$domain."/dashboard?notification=alreadyset");
		}
	}
}else{
	header("Location: ".$domain."/dashboard?info=error");
}
if (isset($_GET['email']) && isset($_GET['instance'])) {
	$email = $_GET['email'];
	$deviceId = $_GET['instance'];
	if (!accountValidate($conn, $email)) {
		header("Location: ".$domain."/dashboard?info=error");
	}else{
		$query = "update `users` set `deviceID` = '$deviceId' where `email` = '$email'";
		$res = mysqli_query($conn, $query);
		if ($res) {
			mysqli_close($conn);
			header("Location: ".$domain."/dashboard?notification=success");
		}else{
			header("Location: ".$domain."/dashboard?info=".$conn -> error);
		}
	}
}
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" referrerpolicy="no-referrer" />
	<title>Wowmomo admin</title>

</head>
<body>

	<section class="w-full h-screen bg-black flex justify-center items-center p-6 text-center flex-col">
		<h2 class="text-white mb-4" id="message"></h2>
		<a id="comBtn" href="" class="bg-white w-full p-4 font-bold rounded-md">Complete Setup</a>
	</section>

	<script src="https://js.pusher.com/beams/1.0/push-notifications-cdn.js"></script>

	<script>

	  const beamsClient = new PusherPushNotifications.Client({
	    instanceId: '364c75e4-9a2b-482b-8b76-536214580f4a',
	  });

	  beamsClient
	  .start()
	  .then((beamsClient) => beamsClient.getDeviceId())
	  .then((deviceId) => {
	    console.log("Successfully registered with Beams. Device ID:", deviceId);
	    document.getElementById("message").innerHTML = "This device is Eligible for notifications!";
	    document.getElementById("comBtn").setAttribute("href", "notification.php?email=<?php echo $email; ?>&instance="+deviceId);
	  })
	  .then(() => beamsClient.addDeviceInterest("<?php echo $email; ?>"))
	  .then(() => beamsClient.getDeviceInterests())
	  .catch(console.error);

	 //  const beamsClientGet = new PusherPushNotifications.Client({
		//   instanceId: '364c75e4-9a2b-482b-8b76-536214580f4a',
		// })

		// beamsClientGet.getDeviceInterests()
		//   .then(interests => {
		//     console.log(interests) // Will log something like ["a", "b", "c"]
		//   })
		//   .catch(e => console.error('Could not get device interests', e));

	 // //  const beamsClientClear = new PusherPushNotifications.Client({
		// //   instanceId: '364c75e4-9a2b-482b-8b76-536214580f4a',
		// // })

		// // // The user will now not be subscribed to any interests
		// // beamsClientClear.clearDeviceInterests()
		// //   .then(() => console.log('Device interests have been cleared'))
		// //   .catch(e => console.error('Could not clear device interests', e));

		// //   const beamsClientSet = new PusherPushNotifications.Client({
		// // 	  instanceId: '364c75e4-9a2b-482b-8b76-536214580f4a',
		// // 	})

		// // 	// The user will now be subscribed to "a", "b" & "c" only
		// // 	beamsClientSet.setDeviceInterests(['<?php //echo $email; ?>'])
		// // 	  .then(() => console.log('Device interests have been set'))
		// // 	  .catch(e => console.error('Could not set device interests', e));
	</script>

</body>
</html>