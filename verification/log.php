<?php
    	include 'include/global.php';
    	include 'include/function.php';

	if (isset($_GET['action']) && $_GET['action'] == 'index') {
?>
		<script type="text/javascript">

			$('title').html('Log');
		
		</script>
<?php

		$log = getLog();

		if (count($log) > 0) {

			echo	"<div class='row'>"
					."<div class='col-md-12'>"
						."<table class='table table-bordered table-hover'>"
								."<thead>"
									."<tr>"
										."<th class='col-md-4'>Log Time</th>"
										."<th class='col-md-4'>Username</th>"
										."<th class='col-md-4'>Data</th>"
									."</tr>"
								."</thead>"
								."<tbody>";

			foreach ($log as $row) {

				echo					"<tr>"
				 					."<td>".$row['log_time']."</td>"
				 					."<td>".$row['user_name']."</td>"
				 					."<td><code>".$row['data']."</code></td>"
				 					."</tr>";

			}

			echo
								"</tbody>"
						."</table>"
					."</div>"
				."</div>";

		} else {

			echo 'Log Empty';

		}

	}
?>