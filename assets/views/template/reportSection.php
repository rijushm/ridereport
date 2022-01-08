<section class="w-full mobile-only block lg:hidden">
	<div class="wrapper p-6">
		<div class="w-full mb-4">
			<a href="/"><ion-icon class="text-2xl" name="chevron-back-outline"></ion-icon></a>
		</div>
		<div class="w-full status mb-4">
			<h2 class="text-3xl font-black mb-6">Reports</h2>
			<div class="mb-2">
				<p class="mb-1 text-sm">Select an option:</p>
				<select id="reportspan" class="w-full px-4 py-4 outline-none border border-grey-200 rounded-md">
					<option value="7">Last 7 Days</option>
					<option value="30">Last 30 Days</option>
					<option value="6">Last 6 Months</option>
					<option value="1">Last 1 Year</option>
					<option value="lifetime">Lifetime</option>
				</select>
			</div>
			<div class="col-span-1">
				<a id="downloadReport" href="<?php echo $domain; ?>/apis/report?email=<?php echo $tokenData1; ?>&type=day&time=7" class="btn-l block text-center w-full bg-black text-white rounded-sm"><ion-icon name="download-outline" class="mr-2"></ion-icon><span>Download</span></a>
			</div>
		</div>
		<?php
			$queryDashReqAll = "select * from `requests` where `employee` = '$tokenData1' ORDER BY `time`";
			$queryDashReq = "select * from `requests` where `employee` = '$tokenData1' ORDER BY `time` DESC limit 10";
			$resDashReqAll = mysqli_query($conn, $queryDashReqAll);
			$resDashReq = mysqli_query($conn, $queryDashReq);
			if (mysqli_num_rows($resDashReq) > 0) {
				$rowCount = mysqli_num_rows($resDashReqAll);
					?>


			<div class="w-full">
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
</section>