<?php
	if(isset($_GET["id"])){
		require("databaseConfig.php");
		logoutRedirectCall($_GET["id"]);		
	}

	function loginSet($email,$state){
		$setSqlTrue = "UPDATE users SET login=true WHERE email = '$email'";
		$setSqlFalse = "UPDATE users SET login=false WHERE email = '$email'";
		if($state == true){
			$res = $GLOBALS['conn']->query($setSqlTrue);
		}else if($state == false){
			$res = $GLOBALS['conn']->query($setSqlFalse);
		}
	}

	function logoutRedirectCall($id){
		$setSql = "UPDATE users SET login=false WHERE id = $id";

		$res = $GLOBALS['conn']->query($setSql);

		header("location: ../index.php");
	}
?>