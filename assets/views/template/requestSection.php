<section class="w-full mobile-only block lg:hidden">
	<?php
	if (isset($_GET['info'])) {
		if ($_GET['info'] == 'invalid') {
			?>
			<div class="alrtMsg bg-warning px-8 py-4 text-white flex justify-center items-center">
				<ion-icon name="alert-circle-outline" class="text-2xl mr-1"></ion-icon>
				<p class="ml-1">Something went wrong! Try Again</p>
			</div>
			<div class="w-full h-12"></div>
			<?php
		}else if ($_GET['info'] == 'sent') {
			?>
			<div class="alrtMsg bg-success px-8 py-4 text-white flex justify-center items-center">
				<ion-icon name="checkmark-circle-outline" class="text-2xl mr-1"></ion-icon>
				<p class="ml-1">Request has been sent successfuly</p>
			</div>
			<div class="w-full h-12"></div>
			<?php
		}
	}
	?>
	<div class="wrapper">
		<div class="w-full h-screen flex items-start justify-start flex-col p-6">

			<h1 class="text-4xl font-black mb-2">Create Request</h1>
			<p class="mb-8 text-center">please enter the details correctly</p>

			<form action="apis/request" method="post" class="w-full">
				<label for="pickup" class="block mb-2">Start Location<sup class="text-red-600">*</sup></label>
				<input id="pickup" type="text" name="pickup" placeholder="Enter start location" required class="w-full block px-4 py-4 rounded-lg outline-none mb-6 bg-gray-200">
				<label for="destination" class="block mb-2">Destination <sup class="text-red-600">*</sup></label>
				<input id="destination" type="text" name="destination" placeholder="Enter your destination" required class="w-full block px-4 py-4 rounded-lg outline-none mb-6 bg-gray-200">

				<p class="mb-2">Select one <sup class="text-red-600">*</sup></p>

				<div class="grid grid-cols-2 gap-4 mb-6">

					<div class="col-span-1 flex justify-center items-start">
						<input type="radio" name="type" id="current" class="hidden" value="current" required checked>
						<label for="current" class="text-md flex justify-center items-center rounded-lg px-4 py-4 w-full border-2 border-black"><ion-icon name="navigate-circle-outline" class="text-xl"></ion-icon> <span class="ml-2">Current</span></label>
					</div>

					<div class="col-span-1">
						<input type="radio" name="type" id="reserved" class="hidden" value="reserved" required>
						<label for="reserved" class="text-md flex justify-center items-center rounded-lg px-4 py-4 w-full border-2 border-black"><ion-icon name="hourglass-outline" class="text-xl"></ion-icon> <span class="ml-2">Reserved</label>
					</div>

				</div>

				<label for="date" class="block mb-2">Date</label>
				<input type="date" id="date" value="<?php echo date('Y-m-d'); ?>" class="w-full block px-4 py-4 rounded-lg outline-none mb-6 bg-gray-200" readonly />

				<input type="hidden" name="employee" value="<?php echo $data['email']; ?>">

				<button type="submit" class="btn-l btn-dark mb-6">Request</button>
			</form>

			<p class="text-center w-full font-bold flex justify-center items-center"><ion-icon name="chevron-back-outline" class="mr-2"></ion-icon><a href="dashboard.php">Dashboard</a></p>
		</div>
	</div>
</section>