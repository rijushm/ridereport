<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" referrerpolicy="no-referrer" />
	<title>Wowmomo admin</title>

</head>
<body>

	<section class="w-full h-screen bg-black flex justify-center items-center">
		<h2 class="text-white" id="message"></h2>
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
	    document.getElementById("message").innerHTML = "This device is Successfully registered for nofications! Device ID "+deviceId;
	  })
	  .then(() => beamsClient.addDeviceInterest("admins"))
	  .then(() => beamsClient.getDeviceInterests())
	  .then((interests) => console.log("Current interests:", interests))
	  .catch(console.error);
	</script>

</body>
</html>