<?php
$msg = '<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Request</title>
	<style type="text/css">
	*{
		padding: 0;
		margin: 0;
		box-sizing: border-box;
		font-family: sans-serif;
	}
	body{
		background-color: #f1c40f;
		padding: 5%;
	}
	section{
		padding: 5% 10%;
		background-color: #fff;
	}
	table{
		width: 100%;
	}
	table p{
		width: 100%;
	}
	h2{
		font-size: 2rem;
		color: #000;
		text-align: center;
		font-weight: 800;
		margin-bottom: 10px;
	}
	.time{
		margin-bottom: 30px;
	}
	.w-full{
		width: 100%;
	}
	.text-center{
		text-align: center;
	}
	table img{
		width: 30px;
		margin-bottom: 1rem;
	}
	.info div p{
		margin-bottom: 1rem;
	}
	h4{
		font-weight: 800;
		color: #000;
		margin-bottom: 10px;
	}
	h3{
		margin-bottom: 1rem;
		font-weight: 800;
	}
	.box a.link{
		text-decoration: none;
		color: #2980b9;
	}
	.btn{
		text-decoration: none;
		width: 100%;
		display: block;
		padding: 2rem 0px;
		border-radius: 5px;
		background-color: #27ae60;
		color: #fff;
		font-weight: 800;
		text-transform: uppercase;
	}
	.btn.reject{
		background-color: #c0392b;
	}
	.box-50.btnconatiner{
		padding: 1rem;
	}
	a.btn[href] {
	    color: #fff !important;
	}
	@media only screen and (max-width: 600px)  {
		section{
			padding: 10%;
		}
		h2{
			font-size: 1.2rem;
		}
		tr{
			display: block;
		}
		td {
			margin-bottom: 1rem;
		    display:block;width:99.9%;clear:both
		  }
	  table img{
			margin-bottom: 0.5rem;
		}
	  .box-50.btnconatiner{
			padding: 0px 0.2rem;
		}
		.info{
			margin: 30px 0px;
		}
		.btn{
			display: block;
		}
	}
</style>
</head>
<body>
	<section>
		<div class="w-full text-center">
			<h2>New Requests from<br> '.$name.'</h2>
			<p class="time">on '.$reqtime.'</p>
		</div>
		<table>
			<tr class="text-center">
				<td>
					<img src="'.$domain.'/assets/images/location.png">
					<h4>Pickup Location</h4>
					<p>'.$pickup.'</p>
				</td>
				<td>
					<img src="'.$domain.'/assets/images/location.png">
					<h4>Destination</h4>
					<p>'.$destination.'</p>
				</td>
			</tr>
			<tr class="text-center w-full info">
				<td colspan="2">
					<h3>User Information</h3>
					<div>
						<p>Name: <b>'.$name.'</b></p>
					</div>
					<div>
						<p>Email: <b>'.$email.'</b></p>
					</div>
					<div>
						<p>Phone: <b><a class="link" href="tel:'.$phone.'">'.$phone.'</a></b></p>
					</div>
				</td>
			</tr>
			<tr class="text-center">
				<td>
					<div class="box-50 btnconatiner">
						<a href="'.$linkAccept.'" class="btn">Approve</a>
					</div>
				</td>
				<td>
					<div class="box-50 btnconatiner">
						<a href="'.$linkReject.'" class="btn reject">Reject</a>
					</div>
				</td>
			</tr>
		</table>
	</div>
</section>
</body>
</html>';

	   $subject = 'New Request from '.$name.' - need action';

	    $to = 'princeriju1@gmail.com';

	   $headers = "From: ".$name." <".$email."> \r\n";
	   $headers  .= 'MIME-Version: 1.0' . "\r\n";
		$headers .= 'Content-type: text/html; charset=UTF-8' . "\r\n";

	   $send_email = mail($to,$subject,$msg,$headers);

	   // echo ($send_email) ? "true" : "false";
?>