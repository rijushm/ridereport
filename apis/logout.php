<?php
session_start();
require '../assets/php/utils.php';
require '../assets/php/sessionCheck.php';
require '../assets/php/logout.php';
include '../assets/db/conn.php';
if (sessionCheck($conn)) {
	logout();
	header("Location: ".$domain."?status=logout");
}
?>