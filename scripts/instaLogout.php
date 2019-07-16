<?php
	require("databaseConfig.php");
	require("loginSet.php");

	loginSet($_GET["email"],false);

	echo "done";
?>