<?php
	require("databaseConfig.php");
	
	$deletSql = "DELETE FROM `users` WHERE Username = 'testDummy'";
	$res = $conn->query($deletSql);
	echo "user(s) testDummy removed";
?>