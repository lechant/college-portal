<?php
	/*define database&server info and credentials*/
	define("DB_SERVER","localhost");
	define("DB_USERNAME","root");
	define("DB_PASS","");
	define("DB_NAME","college_portal");
	
	/*connect to database*/
	$conn = mysqli_connect(DB_SERVER, DB_USERNAME, DB_PASS,DB_NAME);

	if(!$conn){
		die("ERROR: could not connect" . mysqli_connect_error());
	}
?>