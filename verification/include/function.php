<?php

	function getDevice() {

		$sql 	= 'SELECT * FROM demo_device ORDER BY device_name ASC';
		$result	= mysqli_query($sql);
		$arr 	= array();
		$i 	= 0;

		while ($row = mysqli_fetch_array($result)) {

			$arr[$i] = array(
				'device_name'	=> $row['device_name'],
				'sn'		=> $row['sn'],
				'vc'		=> $row['vc'],
				'ac'		=> $row['ac'],
				'vkey'		=> $row['vkey']
			);

			$i++;

		}

		return $arr;

	}
	
	function getDeviceAcSn($vc) {

		$sql 	= "SELECT * FROM demo_device WHERE vc ='".$vc."'";
		$result	= mysqli_query($sql);
		$arr 	= array();
		$i 	= 0;

		while ($row = mysqli_fetch_array($result)) {

			$arr[$i] = array(
				'device_name'	=> $row['device_name'],
				'sn'		=> $row['sn'],
				'vc'		=> $row['vc'],
				'ac'		=> $row['ac'],
				'vkey'		=> $row['vkey']
			);

			$i++;

		}

		return $arr;

	}
	
	function getDeviceBySn($sn) {

		$sql 	= "SELECT * FROM demo_device WHERE sn ='".$sn."'";
		$result	= mysqli_query($sql);
		$arr 	= array();
		$i 	= 0;

		while ($row = mysqli_fetch_array($result)) {

			$arr[$i] = array(
				'device_name'	=> $row['device_name'],
				'sn'		=> $row['sn'],
				'vc'		=> $row['vc'],
				'ac'		=> $row['ac'],
				'vkey'		=> $row['vkey']
			);

			$i++;

		}

		return $arr;

	}

	function getUser() {

		$sql 	= 'SELECT * FROM demo_user ORDER BY user_name ASC';
		$result	= mysqli_query($sql);
		$arr 	= array();
		$i 	= 0;

		while ($row = mysqli_fetch_array($result)) {

			$arr[$i] = array(
				'user_id'	=> $row['user_id'],
				'user_name'	=> $row['user_name']
			);

			$i++;

		}

		return $arr;

	}

	function deviceCheckSn($sn) {

		$sql 	= "SELECT count(sn) as ct FROM demo_device WHERE sn = '".$sn."'";
		$result	= mysqli_query($sql);
		$data 	= mysqli_fetch_array($result);

		if ($data['ct'] != '0' && $data['ct'] != '') {
			return "sn already exist!";
		} else {
			return 1;
		}

	}

	function checkUserName($user_name) {

		$sql	= "SELECT user_name FROM demo_user WHERE user_name = '".$user_name."'";
		$result	= mysqli_query($sql);
		$row	= mysqli_num_rows($result);

		if ($row>0) {
			return "Username exist!";
		} else {
			return "1";
		}

	}

	function getUserFinger($user_id) {

		$sql 	= "SELECT * FROM demo_finger WHERE user_id= '".$user_id."' ";
		$result = mysqli_query($sql);
		$arr 	= array();
		$i	= 0;

		while($row = mysqli_fetch_array($result)) {

			$arr[$i] = array(
				'user_id'	=>$row['user_id'],
				"finger_id"	=>$row['finger_id'],
				"finger_data"	=>$row['finger_data']
				);
			$i++;

		}

		return $arr;

	}
	
	function getLog() {

		$sql 	= 'SELECT * FROM demo_log ORDER BY log_time DESC';
		$result	= mysqli_query($sql);
		$arr 	= array();
		$i 	= 0;

		while ($row = mysqli_fetch_array($result)) {

			$arr[$i] = array(
				'log_time'		=> $row['log_time'],
				'user_name'		=> $row['user_name'],
				'data'			=> $row['data']
			);

			$i++;

		}

		return $arr;

	}
	
	function createLog($user_name, $time, $sn) {
		
		$sq1 		= "INSERT INTO demo_log SET user_name='".$user_name."', data='".date('Y-m-d H:i:s', strtotime($time))." (PC Time) | ".$sn." (SN)"."' ";
		$result1	= mysqli_query($sq1);
		if ($result1) {
			return 1;				
		} else {
			return "Error insert log data!";
		}
		
	}

?>