<?php

	$db=mysqli_connect('localhost', 'root', '', 'dashboard_manage_two');
	if (!$db) {
		// code...
		die("there is no data". mysqli_error($db));
	}

?>