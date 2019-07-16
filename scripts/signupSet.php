<?php
	//require("databaseConfig.php");
	function signupSet($username,$login,$password,$email,$admin=0){
		$login = 1;
		$addSql = "INSERT INTO `users` (Username,login,admin,password,email) VALUES('$username','$login','$admin','$password','$email')";
		
		$res = $GLOBALS['conn']->query($addSql);
	}
	//name all test accounts "testDummy"
	
?>