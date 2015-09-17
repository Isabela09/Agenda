<?php
function displayMessages() {
	if(!empty($_SESSION['messages'])) {
		foreach($_SESSION['messages'] as $message) {
			echo '<p>'.$message.'</p>';
		}
	}	
	$_SESSION['messages'] = array();
}

?>