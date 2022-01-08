<?php
session_start();

require '../vendor/autoload.php';
require '../assets/php/sessionCheck.php';
require '../assets/php/accountValidate.php';
require '../assets/db/conn.php';

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;
use PhpOffice\PhpSpreadsheet\IOFactory;

if (sessionCheck($conn)) {

	if (isset($_GET['email'])) {
		if (!accountValidate($conn, $_GET['email'])) {
			header("Location: ".$domain."/error?credentials=invalidemail");
		}else{
			$email = $_GET['email'];
			$queryUser = "select * from `users` where `email` = '$email'";
			$resUser = mysqli_query($conn, $queryUser);
			while($rowUser = mysqli_fetch_array($resUser)){
				$name = $rowUser['name'];
			}
			// main query
			if (isset($_GET['type'])) {
				if ($_GET['type'] == 'all') {
					$query = "select * from `requests` where `employee` = '$email' ORDER BY `time` DESC";
				}else{
					if (isset($_GET['time'])){
						$type = $_GET['type'];
						$span = $_GET['time'];
						date_default_timezone_set('Asia/Kolkata');
						$curTime = date("Y-m-d H:i:s");
						$prevTime = date('Y-m-d H:i:s', strtotime($curTime .' -'.$span.' '.$type));
						$query = "select * from `requests` where `employee` = '$email' and unix_timestamp(time) BETWEEN unix_timestamp('$prevTime')
                                        AND unix_timestamp('$curTime') ORDER BY `time` DESC";
					}
				}
			}

			$res = mysqli_query($conn, $query);
			if (!mysqli_num_rows($res)) {
				header("Location: ".$domain."/error?credentials=norequest");
			}else{
				$count = mysqli_num_rows($res);
				$spreadsheet = new Spreadsheet();
				$sheet = $spreadsheet->getActiveSheet();
				$spreadsheet->getActiveSheet()->mergeCells("A1:G1");
				$sheet->setCellValue('A1', 'Name : '.$name);
				$sheet->setCellValue('A2', 'ID');
				$sheet->setCellValue('B2', 'Email');
				$sheet->setCellValue('C2', 'Type');
				$sheet->setCellValue('D2', 'Pickup');
				$sheet->setCellValue('E2', 'Destination');
				$sheet->setCellValue('F2', 'Status');
				$sheet->setCellValue('G2', 'Request Time');
				$i = 3;
				while($row = mysqli_fetch_array($res)){
					$sheet->setCellValue('A'.$i, $row['uid']);
					$sheet->setCellValue('B'.$i, $row['employee']);
					$sheet->setCellValue('C'.$i, $row['type']);
					$sheet->setCellValue('D'.$i, $row['pickup']);
					$sheet->setCellValue('E'.$i, $row['destination']);
					$sheet->setCellValue('F'.$i, $row['status']);
					if ($row['status'] == 'approved') {
						$spreadsheet->getActiveSheet()->getStyle('F'.$i)->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)->getStartColor()->setARGB('55efc4');
					}
					$sheet->setCellValue('G'.$i, $row['time']);
					$i++;
				}
				$filename = 'Report-'.$email.'-'.time().'.xlsx';
				// Redirect output to a client's web browser (Xlsx)
				header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
				header('Content-Disposition: attachment;filename="'.$filename.'"');
				header('Cache-Control: max-age=0');
				// If you're serving to IE 9, then the following may be needed
				header('Cache-Control: max-age=1');
				 
				// If you're serving to IE over SSL, then the following may be needed
				header('Expires: Mon, 26 Jul 1997 05:00:00 GMT'); // Date in the past
				header('Last-Modified: ' . gmdate('D, d M Y H:i:s') . ' GMT'); // always modified
				header('Cache-Control: cache, must-revalidate'); // HTTP/1.1
				header('Pragma: public'); // HTTP/1.

				$writer = IOFactory::createWriter($spreadsheet, 'Xlsx');
				$writer->save('php://output');
			}
		}
	}

}else{
	echo 'Sorry! You are not athorised for this feature';
}

?>