<?php
	
if (isset($_GET['msg']) && !empty($_GET['msg'])) {
	
	echo $_GET['msg'];

} elseif (isset($_GET['user_name']) && !empty($_GET['user_name']) && isset($_GET['time']) && !empty($_GET['time'])) {
	
	include 'include/global.php';
	include 'include/function.php';
	
	$user_name	= $_GET['user_name'];
	$time		= date('Y-m-d H:i:s', strtotime($_GET['time']));
	
	echo $user_name." login success on ".date('Y-m-d H:i:s', strtotime($time));
	
} else {
		
	$msg = "Parameter invalid..";
	
	echo "$msg";
	
}

	
?>