<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title><?php echo $uid; ?></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/tailwindcss/2.2.19/tailwind.min.css" referrerpolicy="no-referrer" />
	<style type="text/css">
		section{
			min-height: 100vh;
		}
	</style>
</head>
<body>

	<section class="w-full flex justify-center items-center flex-col text-center p-6">
		<script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
		<div class="mb-6">
			<lottie-player src="https://assets10.lottiefiles.com/packages/lf20_Mt38fp.json"  background="transparent"  speed="1"  style="width: 180px; height: 180px;"  loop autoplay></lottie-player>
		</div>
		<h2 class="text-4xl font-bold mb-2">Request is Rejected</h2>
		<p class="mb-2 text-sm"><?php echo $uid; ?></p>
		<p class="mb-6">Name : <b><?php echo $name; ?></b></p>
		<p class="mb-1">From</p>
		<p class="mb-4"><b><?php echo $pickup; ?></b></p>
		<p class="mb-1">To</p>
		<p class="mb-4"><b><?php echo $destination; ?></b></p>
	</section>

</body>
</html>