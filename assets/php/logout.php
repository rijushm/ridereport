<?php
function logout(){
	if (isset($_SESSION['rideutilswow'])) {
		$_SESSION['rideutilswow'] = '';
		return true;
	}else{
		return false;
	}
}
?>