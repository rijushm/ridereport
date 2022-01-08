<section class="w-full mobile-only block lg:hidden relative">
	<?php
	if (isset($_GET['credentials'])) {
		if ($_GET['credentials'] == 'invalid') {
			?>
			<div class="alrtMsg bg-warning px-8 py-4 text-white flex justify-center items-center">
				<ion-icon name="alert-circle-outline" class="text-2xl mr-1"></ion-icon>
				<p class="ml-1">Invalid Credentials</p>
			</div>
			<?php
		}else if ($_GET['credentials'] == 'success') {
			?>
			<div class="alrtMsg bg-success px-8 py-4 text-white flex justify-center items-center">
				<ion-icon name="checkmark-circle-outline" class="text-2xl mr-1"></ion-icon>
				<p class="ml-1">Registered Successfuly</p>
			</div>
			<?php
		}
	}else if (isset($_GET['status'])) {
		if ($_GET['status'] == 'logout') {
			?>
			<div class="alrtMsg bg-success px-8 py-4 text-white flex justify-center items-center">
				<ion-icon name="checkmark-circle-outline" class="text-2xl mr-1"></ion-icon>
				<p class="ml-1">Logout succesful</p>
			</div>
			<?php
		}
	}
	?>
	<div class="wrapper">
		<div class="w-full h-screen flex items-start justify-center flex-col p-6">
			<h1 class="text-5xl font-black mb-4">Login</h1>
			<p class="mb-6 text-center">Login with your email and password</p>
			<form action="apis/login-submission" method="post" class="w-full">
				<label class="block mb-2">Email <sup class="text-red-600">*</sup></label>
				<input type="text" name="email" placeholder="Enter your email ID" required class="w-full block px-4 py-4 rounded-lg outline-none mb-6 bg-gray-200">
				<label class="block mb-2">Password <sup class="text-red-600">*</sup></label>
				<input type="password" name="password" placeholder="Enter password" required class="w-full block px-4 py-4 rounded-lg outline-none mb-6 bg-gray-200">

				<button type="submit" class="btn-l btn-dark mb-4">Login</button>
				<a href="register" class="btn-l btn-primary mb-6 block text-center">Create Account</a>

				<a href="forget-password" class="font-black text-black">Forgot Password?</a>
			</form>
		</div>
	</div>
</section>