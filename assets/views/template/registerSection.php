<section class="w-full mobile-only block lg:hidden relative">
	<?php
	if (isset($_GET['credentials'])) {
		if ($_GET['credentials'] == 'invalid') {
			?>
			<div class="alrtMsg bg-warning px-8 py-4 text-white flex justify-center items-center">
				<ion-icon name="alert-circle-outline" class="text-2xl mr-1"></ion-icon>
				<p class="ml-1">Invalid Email Address</p>
			</div>
			<?php
		}else if ($_GET['credentials'] == 'created') {
			?>
			<div class="alrtMsg bg-warning px-8 py-4 text-white flex justify-center items-center">
				<ion-icon name="alert-circle-outline" class="text-2xl mr-1"></ion-icon>
				<p class="ml-1">This email ID has an account already</p>
			</div>
			<?php
		}
	}
	?>
	<div class="wrapper">
		<div class="w-full h-screen flex items-start justify-center flex-col p-6">
			<h1 class="text-5xl font-black mb-4">Register</h1>
			<p class="mb-6 text-center">Enter your valid email ID</p>
			<form action="register" method="post" class="w-full">
				<label class="block mb-2">Email <sup class="text-red-600">*</sup></label>
				<input type="text" name="email" placeholder="Enter your email ID" required class="w-full block px-4 py-4 rounded-lg outline-none mb-6 bg-gray-200">

				<button type="submit" class="btn-l btn-dark mb-4">Submit</button>

				<p>Already have an account? <a href="<?php echo $domain; ?>" class="font-black text-black">Login</a></p>
			</form>
		</div>
	</div>
</section>