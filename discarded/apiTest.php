<?php
	$arr = array("one","two","three");
	$data = array(
		"thots" => "gae",
		"whos"	=> "rem",
		"hotel" => "trivago",
		"count" => $arr
	);
	
	echo json_encode($data);
?>