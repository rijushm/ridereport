<a href="<?php echo $domain; ?>/requests?id=<?php echo $data['uid']; ?>">
	<div class="rounded-xl shadow-2xl px-6 py-4 mb-4">
		<div class="flex justify-between items-center">
			<span class="px-4 py-1 text-white rounded-sm inline-block mb-4 capitalize
			<?php 
			if($data['status'] == 'pending'){ echo 'bg-yellow-600'; }else if( $data['status'] == 'approved'){ echo 'bg-success'; }else if( $data['status'] == 'rejected' ){ echo 'bg-warning'; }
			?>"><?php echo $data['status']; ?></span>
			<?php
			$datatime = $data['time'];
			$times = date('H', strtotime($datatime)).':'.date('i', strtotime($datatime)).' '.date('A', strtotime($datatime));
			$date = date('d', strtotime($datatime)).ordinal(date('d', strtotime($datatime))).' '.date('M', strtotime($datatime)).', '.date('y', strtotime($datatime));
			date_default_timezone_set('Asia/Kolkata');
			$dbdate = date("Y-m-d", strtotime($datatime));
			$currenttime = date("Y-m-d");
			?>
			<div class="text-sm flex justify-center items-end flex-col">
				<p><?php echo $times; ?></p>
				<p><?php if($dbdate == $currenttime) echo '(Today)'; ?> <?php echo $date; ?></p>
			</div>
		</div>
		<div class="w-full flex justify-start items-start">
			<div class="mr-2" style="transform: translateY(2px);">
				<ion-icon name="navigate-circle-outline"></ion-icon>
			</div>
			<div>
				<p class="flex justify-start items-center text-sm mb-1">From</p>
				<p class="font-bold mb-4"><?php echo $data['pickup']; ?></p>
			</div>
		</div>

		<div class="w-full flex justify-start items-start">
			<div class="mr-2" style="transform: translateY(2px);">
				<ion-icon name="checkmark-circle-outline"></ion-icon>
			</div>
			<div>
				<p class="flex justify-start items-center text-sm mb-1">To</p>
				<p class="font-bold mb-4"><?php echo $data['destination']; ?></p>
			</div>
		</div>
	</div>
</a>