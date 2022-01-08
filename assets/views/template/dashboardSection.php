<section class="w-full mobile-only block lg:hidden">
	<div class="wrapper">
		<div class="w-full flex items-start justify-start flex-col p-6">

			<div id="dash-head" class="w-full flex justify-between items-start">
				<div>
					<h2 class="text-md color-red mb-1">Welcome, <span class="font-bold"><?php echo $row['name']; ?></span></h2>
					<h1 class="text-3xl font-black mb-6">Dashboard</h1>
				</div>

				<div id="logout" class="w-12 h-12 flex justify-center items-center p-2 bg-red-600 rounded-lg text-white text-xl">
					<a href="apis/logout">
						<ion-icon name="power-outline"></ion-icon>
					</a>
				</div>
			</div>

			<!-- Options -->
			<div class="grid grid-cols-2 w-full gap-4 mb-6">
				<div class="col-span-1">
					<a href="request.php">
						<div class="w-full h-36 bg-black text-white rounded-xl flex justify-center items-start flex-col p-6">
							<ion-icon name="car-sport-outline" class="mb-2 text-5xl"></ion-icon>
							<h3 class="text-lg font-bold">Request</h3>
						</div>
					</a>
				</div>
				<div class="col-span-1">
					<a href="<?php echo $domain.'/report'; ?>">
						<div class="w-full h-36 bg-black text-white rounded-xl flex justify-center items-start flex-col p-6">
							<ion-icon name="calendar-outline" class="mb-2 text-5xl"></ion-icon>
							<h3 class="text-lg font-bold">Report</h3>
						</div>
					</a>
				</div>
			</div>
			<!-- Options -->

			<?php
			$queryDashReqAll = "select * from `requests` where `employee` = '$tokenData1' ORDER BY `time`";
			$queryDashReq = "select * from `requests` where `employee` = '$tokenData1' ORDER BY `time` DESC limit 10";
			$resDashReqAll = mysqli_query($conn, $queryDashReqAll);
			$resDashReq = mysqli_query($conn, $queryDashReq);
			if (mysqli_num_rows($resDashReq) > 0) {
				$rowCount = mysqli_num_rows($resDashReqAll);
					?>


			<div class="w-full">
				<div class="flex justify-between items-center mb-4">
					<h2 class="text-xl font-bold">Recent Requests</h2>
					<a href="<?php echo $domain; ?>" class="text-2xl"><ion-icon name="refresh-outline"></ion-icon></a>
				</div>

				<div class="status-box w-full">
					<?php
					while($data = mysqli_fetch_array($resDashReq)){
						include 'assets/views/requestCardDash.php';
					}
					if ($rowCount > 10) {
						?>
						<div class="mt-8 text-center">
							<a href="/allrequest" class="btn-l btn-primary mb-6 block text-center">View All Requests (<?php echo $rowCount; ?>) </a>
						</div>
						<?php
					}
					?>
				</div>
			</div>

			<?php
				}else{
					?>
					<p>You don't have any ride request yet.</p>
					<?php
				}
			?>

		</div>
	</div>
</section>