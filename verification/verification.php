<?php

if (isset($_GET['user_id']) && !empty($_GET['user_id'])) {
	
	include 'include/global.php';
	include 'include/function.php';
	
	$user_id 	= $_GET['user_id'];
	$finger		= getUserFinger($user_id);

	echo "$user_id;".$finger[0]['finger_data'].";SecurityKey;".$time_limit_ver.";".$base_path."process_verification.php;".$base_path."getac.php".";extraParams";
		
}

?>