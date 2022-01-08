<?php
$datatime = $data['time'];
$times = date('H', strtotime($datatime)).':'.date('i', strtotime($datatime)).' '.date('A', strtotime($datatime));
$date = date('d', strtotime($datatime)).ordinal(date('d', strtotime($datatime))).' '.date('M', strtotime($datatime)).', '.date('y', strtotime($datatime));
?>
<section class="w-full mobile-only block lg:hidden p-6">
	<div class="w-full mb-4">
		<a href="/"><ion-icon class="text-2xl" name="chevron-back-outline"></ion-icon></a>
	</div>
	<div class="w-full status">
		<h2 class="text-3xl font-black mb-6">Request Information</h2>

		<div class="flex justify-start items-start mb-12">
			<div class="mr-4">
				<ion-icon class="text-3xl shadow-2xl text-green-500" name="checkmark-circle"></ion-icon>
			</div>
			<div>
				<h4 class="text-lg font-black">Request Created</h4>
				<p class="text-sm"><?php echo $times.' '.$date; ?></p>
			</div>
		</div>

		<div class="flex justify-start items-start mb-12">
			<div class="mr-4">
				<ion-icon class="text-3xl shadow-2xl text-green-500" name="checkmark-circle"></ion-icon>
			</div>
			<div>
				<h4 class="text-lg font-black">Request Sent</h4>
				<p class="text-sm"><?php echo $times.' '.$date; ?></p>
			</div>
		</div>

		<?php
		if ($data['status'] == 'pending') {
			?>
			<div class="flex justify-start items-start mb-8 opacity-75">
				<div class="mr-4">
					<ion-icon class="text-3xl shadow-2xl text-yellow-500" name="alert-circle"></ion-icon>
				</div>
				<div>
					<h4 class="text-lg font-black">Not Approved</h4>
				</div>
			</div>
			<?php
		}else if ($data['status'] == 'approved') {
			?>
			<div class="flex justify-start items-start mb-8">
				<div class="mr-4">
					<ion-icon class="text-3xl shadow-2xl text-green-500" name="checkmark-circle"></ion-icon>
				</div>
				<div>
					<h4 class="text-lg font-black">Approved</h4>
					<p class="text-sm"><?php echo $times.' '.$date; ?></p>
				</div>
			</div>
			<?php
		}else if ($data['status'] == 'rejected') {
			?>
			<div class="flex justify-start items-start mb-8 opacity-75">
				<div class="mr-4">
					<ion-icon class="text-3xl shadow-2xl text-red-500" name="close-circle"></ion-icon>
				</div>
				<div>
					<h4 class="text-lg font-black">Rejected</h4>
					<p class="text-sm"><?php echo $times.' '.$date; ?></p>
				</div>
			</div>
			<?php
		}
		?>
	</div>

	<div class="w-full info rounded-lg shadow-2xl p-8 mb-8">
		<div class="bg-black py-1 px-4 rounded-sm text-white capitalize inline-block mb-4">
			<?php echo $data['type']; ?>
		</div>
		<p class="text-sm mb-1">Pickup Location</p>
		<h4 class="text-lg font-black mb-4"><?php echo $data['pickup']; ?></h4>
		<p class="text-sm mb-1">Destination</p>
		<h4 class="text-lg font-black"><?php echo $data['destination']; ?></h4>
	</div>

	<div class="text-center text-red-600">
		<ion-icon name="trash" class="mr-2"></ion-icon><a href="<?php echo $domain; ?>">Delete Request</a>
	</div>
</section>