<section class="w-full mobile-only block lg:hidden relative">
	<?php
	if (isset($_GET['info'])) {
		if ($_GET['info'] == 'passwwordnotmatched') {
			?>
			<div class="alrtMsg bg-warning px-8 py-4 text-white flex justify-center items-center">
				<ion-icon name="alert-circle-outline" class="text-2xl mr-1"></ion-icon>
				<p class="ml-1">Confirm Password Should Be Same</p>
			</div>
			<div class="w-full h-12"></div>
			<?php
		}else if ($_GET['info'] == 'shortpassword') {
			?>
			<div class="alrtMsg bg-warning px-8 py-4 text-white flex justify-center items-center">
				<ion-icon name="alert-circle-outline" class="text-2xl mr-1"></ion-icon>
				<p class="ml-1">Password should have minimum 6 digits</p>
			</div>
			<div class="w-full h-12"></div>
			<?php
		}
	}
	?>
	<div class="wrapper">
		<div class="w-full flex items-start justify-center flex-col p-6">
			<h1 class="text-3xl font-black mb-4">Complete Registration</h1>
			<p class="mb-6 text-center">Enter Your Details Below</p>
			<form action="apis/registration" method="post" class="w-full">
				<label class="block mb-2">Email <sup class="text-red-600">*</sup></label>
				<input type="text" name="email" placeholder="Enter your email ID" required class="w-full block px-4 py-4 rounded-lg outline-none mb-6 bg-gray-200" readonly value="<?php echo $email; ?>">
				<label class="block mb-2">Full Name <sup class="text-red-600">*</sup></label>
				<input type="text" name="name" placeholder="Enter Your Full Name" required class="w-full block px-4 py-4 rounded-lg outline-none mb-6 bg-gray-200">
				<label class="block mb-2">Phone Number <sup class="text-red-600">*</sup></label>
				<input type="tel" name="phone" placeholder="Enter Number (Without country code)" required class="w-full block px-4 py-4 rounded-lg outline-none mb-6 bg-gray-200">
				<label class="block mb-2">Password <sup class="text-red-600">*</sup></label>
				<input type="password" name="password" placeholder="Enter Password (Minimum 6 Digits)" required class="w-full block px-4 py-4 rounded-lg outline-none mb-6 bg-gray-200">
				<label class="block mb-2">Confirm Password <sup class="text-red-600">*</sup></label>
				<input type="password" name="conPassword" placeholder="Enter The Password Again" required class="w-full block px-4 py-4 rounded-lg outline-none mb-6 bg-gray-200">

				<button type="submit" class="btn-l btn-dark mb-4">Submit</button>

				<p>Already have an account? <a href="<?php echo $domain; ?>" class="font-black text-black">Login</a></p>
			</form>
		</div>
	</div>
</section>