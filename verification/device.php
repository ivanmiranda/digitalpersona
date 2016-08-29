<?php
    	include 'include/global.php';
    	include 'include/function.php';

	if (isset($_GET['action']) && $_GET['action'] == 'index') {
?>

		<script type="text/javascript">

			$('title').html('Device');

			function device_delete(device_name, sn) {

				var r = confirm("Delete device "+device_name+" ( "+sn+" )?");

				if (r == true) {

					push('device.php?action=delete&sn='+sn);

				}
			}

		</script>

		<div class="row">
			<div class="col-md-12">
				<button type="button" class="btn btn-success" onclick="load('<?php echo $base_path?>device.php?action=create')">Add</button>
			</div>
		</div>
		<br>

<?php

		$device = getDevice();

		if (count($device) > 0) {

			echo	"<div class='row'>"
					."<div class='col-md-12'>"
						."<table class='table table-bordered table-hover'>"
								."<thead>"
									."<tr>"
										."<th class='col-md-3'>Device Name</th>"
										."<th class='col-md-2'>Device SN</th>"
										."<th class='col-md-2'>Device VC</th>"
										."<th class='col-md-2'>Device AC</th>"
										."<th class='col-md-2'>Device VKEY</th>"
										."<th class='col-md-1'>Action</th>"
									."</tr>"
								."</thead>"
								."<tbody>";

			foreach ($device as $row) {

				echo 					"<tr>"
					 					."<td>".$row['device_name']."</td>"
					 					."<td><code>".$row['sn']."</code></td>"
					 					."<td><code>".$row['vc']."</code></td>"
					 					."<td><code>".$row['ac']."</code></td>"
					 					."<td><code>".substr($row['vkey'], 0, 2)."...</code></td>"
					 					."<td>"
					 						."<button type='button' class='btn btn-xs btn-danger' onclick=\"device_delete('".$row['device_name']."','".$row['sn']."')\">Delete</button>"
				 						."</td>"
				 					."</tr>";

			}

			echo
								"</tbody>"
						."</table>"
					."</div>"
				."</div>";

		} else {

			echo 'Device Empty';

		}

	} elseif (isset($_GET['action']) && $_GET['action'] == 'create') {
?>
		<script type="text/javascript">

			$('title').html('Add Device');

			function device_store() {

				device_name	= $('#device_name').val();
				sn 		= $('#sn').val();
				ac 		= $('#ac').val();
				vc 		= $('#vc').val();
				vkey 		= $('#vkey').val();
				push('device.php?action=store&device_name='+device_name+'&sn='+sn+'&ac='+ac+'&vc='+vc+'&vkey='+vkey);

			}

		</script>

			<div class="row">
				<div class="col-md-4">

				</div>
				<div class="col-md-4">
					<div class="form-group">
						<label for="device_name">Device Name</label>
						<input type="text"  id="device_name" class="form-control" placeholder="Enter Name">
					</div>
					<div class="form-group">
						<label for="sn">Device SN</label>
						<input type="text" id="sn" class="form-control" placeholder="Enter SN">
					</div>
					<div class="form-group">
						<label for="vc">Device VC</label>
						<input type="text" id="vc" class="form-control" placeholder="Enter VC">
					</div>
					<div class="form-group">
						<label for="ac">Device AC</label>
						<input type="text" id="ac" class="form-control" placeholder="Enter AC">
					</div>
					<div class="form-group">
						<label for="vkey">Device VKEY</label>
						<input type="text" id="vkey" class="form-control" placeholder="Enter VKEY">
					</div>
					<a class="btn btn-default" onclick="load('<?php echo $base_path?>device.php?action=index')">Back</a>
					<button type="submit" class="btn btn-success" onclick="device_store()">Save</button>
				</div>
				<div class="col-md-4">

				</div>
			</div>

<?php
	} elseif (isset($_GET['action']) && $_GET['action'] == 'store') {

		$res 		= array();
        		$res['result'] 	= false;

		if ($_GET['device_name'] == '' || !isset($_GET['device_name']) || empty($_GET['device_name'])) {

			$res['device_name'] = "device name can't empty";

		}

		if ($_GET['sn'] == '' || !isset($_GET['sn']) || empty($_GET['sn'])) {

			$res['sn'] = "device sn can't empty";

		} elseif (isset($_GET['sn']) && !empty($_GET['sn'])) {

			$sn = deviceCheckSn($_GET['sn']);

			if ($sn != 1) {

				$res['sn'] = $sn;

			}

		}

		if ($_GET['vc'] == '' || !isset($_GET['vc']) || empty($_GET['vc'])) {

			$res['vc'] = "device vc can't empty";

		}

		if ($_GET['ac'] == '' || !isset($_GET['ac']) || empty($_GET['ac'])) {

			$res['ac'] = "device ac can't empty";

		}

		if ($_GET['vkey'] == '' || !isset($_GET['vkey']) || empty($_GET['vkey'])) {

			$res['vkey'] = "device vkey can't empty";

		}

		if (count($res) > 1) {

			echo json_encode($res);

		} else {

			$sql 	= "INSERT INTO demo_device SET device_name='".$_GET['device_name']."', sn='".$_GET['sn']."', vc='".$_GET['vc']."', ac='".$_GET['ac']."', vkey='".$_GET['vkey']."' ";
			$result = mysqli_query($sql);

			if ($result) {

				$res['result'] 	= true;
				$res['reload'] 	= "device.php?action=index";

			} else {

				$res['server'] = "Error insert data!";

			}

			echo json_encode($res);

		}

	} elseif (isset($_GET['action']) && $_GET['action'] == 'delete') {

		$sql1		= "DELETE FROM demo_device WHERE sn = '".$_GET['sn']."' ";
		$result1	= mysqli_query($sql1);

		if ($result1) {

			$res['result']	= true;
			$res['reload'] 	= "device.php?action=index";

		} else {

			$res['server'] = "Error delete data!#".$sql1;

		}

		echo json_encode($res);

	} else {

		echo "Parameter invalid..";

	}
?>